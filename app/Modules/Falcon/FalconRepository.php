<?php


namespace App\Modules\Falcon;


use App\Models\Falcon;
use App\Models\FalconFileDetail;
use App\Modules\Payment\Payment;
use App\Soap\Request\SubmitFalconAttachment;
use App\Soap\Request\SubmitFalconRequest;
use App\Soap\Response\SubmitFalconAttachmentResponse;
use App\Soap\Response\SubmitFalconRequestResponse;
use Artisaninweb\SoapWrapper\SoapWrapper;
use Illuminate\Support\Facades\DB;

class FalconRepository
{
    use FalconRepoHelper;

    private $falconModel;
    private $soapWrapper;

    public function __construct()
    {
        $this->falconModel = new Falcon();
        $this->soapWrapper = new SoapWrapper();

    }

    public function create(array $data)
    {
        $data['user_id'] = auth('civil')->user()->id ?? $data['user_id'] ?? null;
        $falcon = $this->falconModel->create($data);
        // Check Files

        $this->createFiles($falcon,$data);

        return return_msg(true,'Success',compact('falcon'));
    }

    public function update(array $data)
    {
        $user = auth('civil')->user();
        $falcon = $this->falconModel->where('id',$data['id'] ?? null);
        $user ? $falcon = $falcon->where('user_id',$user->id):null;
        $falcon = $falcon->first();
        if (!$falcon){
            return return_msg(false,'Not Found');
        }
        $falcon->update($data);

        $this->createFiles($falcon,$data);

        return return_msg(true,'Success',compact('falcon'));
    }

    public function show($id)
    {

        $user = auth('civil')->user();
        $hospital = auth('hospital')->user();
        $falcon = $this->falconModel->where('id',$id);

        $user ? $falcon = $falcon->where('user_id',$user->id):null;
        $hospital ? $falcon = $falcon->where('P_FAL_INJ_HOSPITAL',$hospital->hospital_id):null;

        $falcon = $falcon->first();

        if (!$falcon){
            return return_msg(false,'Not Found');
        }
        $falcon->load([
            'user',
            'type',
            'fal_type',
            'origin_country',
            'fal_city',
            'hospital',
            'file_details',
        ]);
        return return_msg(true,'Success',compact('falcon'));
    }

    public function all(array $data = [])
    {
        $falcons = $this->falconModel->with([
            'user',
            'type',
            'fal_type',
            'origin_country',
            'fal_city',
            'hospital',
            'file_details'
        ])->orderBy('id','desc');

        $this->filterFalcon($falcons,$data);

        $falcons = $falcons->get();
        return return_msg(true,'Success',compact('falcons'));
    }

    public function delete($id)
    {
        $falcon = $this->falconModel->find($id);
        if (!$falcon){
            return return_msg(false,'Not Found');
        }
        foreach ($falcon->file_details as $file){

            $file_object = $file->getFile;
            try {
                $file_object ? unlink(storage_path('files/falcon/'.$file_object->name)) : null;
            }catch (\Exception $exception)
            {

            }
            $file_object->delete();
            $file->delete();

        }
        $falcon->delete();

        return return_msg(true,'Success');


    }

    public function deleteFileDetail($id)
    {
        $file_details = FalconFileDetail::find($id);
        if (!$file_details){
            return return_msg(false,'Not Found');
        }
        $file_object = $file_details->getFile;
        try {
            $file_object ? unlink(storage_path('files/falcon/'.$file_object->name)) : null;
        }catch (\Exception $exception)
        {
        }

        $file_object->delete();
        $file_details->delete();

        return return_msg(true,'Success');


    }

    public function updateHospital($data)
    {

        $hospital = auth('hospital')->user();
        $falcon = $this->falconModel->where('id',$data['id'] ?? null);

        $hospital ? $falcon = $falcon->where('P_FAL_INJ_HOSPITAL',$hospital->hospital_id):null;
        $falcon = $falcon->first();
        if (!$falcon){
            return return_msg(false,'Not Found');
        }
        if (!$falcon->is_hospital){

            return return_msg(false,'Not Found',[
                "validation_errors"=>[
                    "P_FAL_PIT_NO" => ['تم اضافة الطلب من قبل']
                ]
            ]);
        }


        $falcon->P_FAL_PIT_NO = $data['P_FAL_PIT_NO'] ?? null;
        $falcon->P_FAL_RING_NO = $data['P_FAL_RING_NO'] ?? null;
        $falcon->P_FAL_INJ_DATE = $data['P_FAL_INJ_DATE'] ?? null;
        $falcon->is_hospital = 0;

        if ($data['file'] ?? null)
        {
            $uploaded_file = uploadFile($data['file'] ,'falcon');
            $falcon->certificate_file = $uploaded_file['name'];

        }


        $falcon->save();
        $falcon->refresh();

        //// Send Order
        $this->sendSoapRequest($falcon);



        return return_msg(true,'Success',compact('falcon'));
    }

    public function getFalconData($data)
    {

        // Call Soap
        $data = $this->getFalconDataSoap($data['P_O_CIVIL_ID'] ?? null,$data['P_FAL_PIT_NO'] ?? null);

        return return_msg(true,"Success",compact('data'));



    }

    public function getFalconCivilInfo($P_O_CIVIL_ID)
    {
        // Call Soap
        $response = $this->getFalconCivilInfoSoap($P_O_CIVIL_ID);

        return return_msg(true,"Success",compact('response'));



    }

    public function sendData($id)
    {
        $user = auth('civil')->user();
        $hospital = auth('hospital')->user();
        $falcon = $this->falconModel->where('id',$id);

//        $user ? $falcon = $falcon->where('user_id',$user->id):null;
//        $hospital ? $falcon = $falcon->where('P_FAL_INJ_HOSPITAL',$hospital->hospital_id):null;

        $falcon = $falcon->first();

        if (!$falcon){
            return return_msg(false,'Not Found');
        }
        if ($falcon->P_OUT_REQUEST_NO){
            return return_msg(false,'Not Found');
        }
        $this->sendSoapRequest($falcon);
        return return_msg(true,"Success");

    }

    public function pay($data)
    {

        $falcon = $this->falconModel->where('P_OUT_REQUEST_NO',$data['P_OUT_REQUEST_NO'] ?? null)->first();
        if (!$falcon){
            return return_msg(false,'Not Found');
        }

        // Get Amount
        $response = $this->getFalconData($falcon->id)['data']['data'] ?? null;
        if (!$response){
            return return_msg(false,'Not Found');
        }

        if (!($response['amount'] ?? null)){
            return return_msg(false,'Not Found',[
                "validation_errors" => ["P_OUT_REQUEST_NO" => [$response['statusMsg'] ?? 'لا يمكن دفع الطلب']]
            ]);
        }

        $paymentPresenter = new Payment();
        $pData['name'] = $falcon->P_O_A_NAME;
        $pData['email'] = $falcon->P_O_MAIL;
        $pData['phone'] = $falcon->P_O_MOBILE;
        $pData['cost'] = 5;
        $pData['paymentable_type'] = $this->falconModel->getMorphClass();
        $pData['paymentable_id'] = $falcon->id;

        $payment =  $paymentPresenter->create($pData,$buyer['payment_type_id'] ?? 2);

        if($payment['status'] ?? null){
            $payment_link = $payment['data']['pay']['link'];
            return return_msg(true,"Success",compact('payment_link'));
        }

        return return_msg(false,'Not Found');
    }

    public function sendSoap($data)
    {
        try {

            $this->soapWrapper->add('Falcon', function ($service) {
                $service
                    ->wsdl(env('FALCON_SOAP'))
                    ->trace(true)
                    ->options(['user_agent' => 'PHPSoapClient'])
                    ->classmap([
                        SubmitFalconRequest::class,
                        SubmitFalconRequestResponse::class,
                    ]);
            });

            $response = $this->soapWrapper->call('Falcon.submitFalconRequest', [
                new SubmitFalconRequest($data['P_REQUEST_TYP'] ?? null, $data['P_O_CIVIL_ID'] ?? null,
                    $data['P_O_A_NAME'] ?? null, $data['P_O_ADDRESS'] ?? null,
                    $data['P_O_MOBILE'] ?? null, $data['P_O_PASSPORT_NO'] ?? null,
                    $data['P_CIVIL_EXPIRY_DT'] ?? null, $data['P_O_MAIL'] ?? null,
                    $data['P_NW_CIVIL_ID'] ?? null, $data['P_NW_A_NAME'] ?? null,
                    $data['P_NW_ADDRESS'] ?? null, $data['P_NW_MOBILE'] ?? null,
                    $data['P_NW_PASSPORT_NO'] ?? null, $data['P_NW_CIVIL_EXPIRY'] ?? null,
                    $data['P_CUR_PASS_FAL'] ?? null, $data['P_NW_O_MAIL'] ?? null,
                    $data['P_FAL_SEX'] ?? null, $data['P_FAL_SPECIES'] ?? null,
                    $data['P_FAL_TYPE'] ?? null, $data['P_FAL_OTHER_TYPE'] ?? null,
                    $data['P_FAL_ORIGIN_COUNTRY'] ?? null, $data['P_FAL_CITES_NO'] ?? null,
                    $data['P_FAL_PIT_NO'] ?? null, $data['P_FAL_RING_NO'] ?? null,
                    $data['P_FAL_INJ_DATE'] ?? null, $data['P_FAL_INJ_HOSPITAL'] ?? null,
                    $data['P_PAYMENT_ID'] ?? null, $data['P_AMOUNT'] ?? null,
                    $data['P_TRANS_ID'] ?? null, $data['P_TRACK_ID'] ?? null
                )
            ]);
            $json = json_encode($response);
            $response = json_decode($json,TRUE);

            return return_msg(true,"success",compact('response'));



        }catch (\Exception $exception){

            return return_msg(false,"Server Error",compact('response'));

        }
    }

}
