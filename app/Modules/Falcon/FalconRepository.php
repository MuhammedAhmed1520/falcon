<?php


namespace App\Modules\Falcon;


use App\Models\Falcon;
use App\Models\FalconFileDetail;
use Artisaninweb\SoapWrapper\SoapWrapper;

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

        $falcon = $this->falconModel->find($data['id'] ?? null);
        if (!$falcon){
            return return_msg(false,'Not Found');
        }
        $falcon->update($data);

        $this->createFiles($falcon,$data);

        return return_msg(true,'Success',compact('falcon'));
    }

    public function show($id)
    {

        $falcon = $this->falconModel->find($id);
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
        $falcon = $this->falconModel->find($data['id'] ?? null);
        if (!$falcon){
            return return_msg(false,'Not Found');
        }
        if (!$falcon->P_FAL_PIT_NO){

            return return_msg(false,'Not Found',[
                "validation_errors"=>[
                    "P_FAL_PIT_NO" => ['تم اضافة الطلب من قبل']
                ]
            ]);
        }


        $falcon->P_FAL_PIT_NO = $data['P_FAL_PIT_NO'] ?? null;
        $falcon->P_FAL_RING_NO = $data['P_FAL_RING_NO'] ?? null;
        $falcon->P_FAL_INJ_DATE = $data['P_FAL_INJ_DATE'] ?? null;

        if ($data['file'] ?? null)
        {
            $uploaded_file = uploadFile($data['file'] ,'falcon');
            $falcon->certificate_file = $uploaded_file['name'];

        }

        $falcon->save();
        $falcon->refresh();

        // Create File

        //// Send Order
//        $this->sendSoapRequest($falcon);


        return return_msg(true,'Success',compact('falcon'));
    }

}
