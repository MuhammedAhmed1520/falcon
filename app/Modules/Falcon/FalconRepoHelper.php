<?php


namespace App\Modules\Falcon;


use App\Soap\Request\GetFalconCivilInfoRequest;
use App\Soap\Request\GetFalconDataRequest;
use App\Soap\Request\SubmitFalconAttachment;
use App\Soap\Request\SubmitFalconRequest;
use App\Soap\Response\GetFalconCivilInfoResponse;
use App\Soap\Response\GetFalconDataResponse;
use App\Soap\Response\SubmitFalconAttachmentResponse;
use App\Soap\Response\SubmitFalconRequestResponse;
use finfo;
use Illuminate\Support\Facades\DB;

trait FalconRepoHelper
{

    protected function filterFalcon(&$model,$data)
    {

        $data['user_id'] = $data['user_id'] ?? auth('civil')->user()->id ?? null;

        if ($data['hospital_id'] ?? null)
        {
            $model->where('P_FAL_INJ_HOSPITAL',$data['hospital_id']);

        }

        if (isset($data['is_hospital']))
        {
            $model->where('is_hospital',$data['is_hospital']);

        }

        if ($data['query'] ?? null)
        {
            $model->where(function ($item)use($data){
               return $item
                   ->where('P_O_PASSPORT_NO','like',"%".$data['query']."%")
                   ->orWhere('P_CIVIL_EXPIRY_DT','like',"%".$data['query']."%")
                   ->orWhere('P_O_MAIL','like',"%".$data['query']."%")
                   ->orWhere('P_O_A_NAME','like',"%".$data['query']."%")
                   ->orWhere('P_O_CIVIL_ID','like',"%".$data['query']."%")
                   ->orWhere('P_OUT_REQUEST_NO','like',"%".$data['query']."%")
                   ->orWhere('P_STATUS_MSG','like',"%".$data['query']."%")
                   ->orWhere('P_FAL_PIT_NO','like',"%".$data['query']."%");
            });

        }

        if ($data['user_id'] ?? null)
        {
            if (auth()->check()){
                $model->where('user_id',$data['user_id']);
            }else{
                $model->where('user_id',$data['user_id'])
                    ->where(function ($item)use($data){
                        return $item
                            ->whereNull('P_OUT_REQUEST_NO')
                            ->orwhere('P_OUT_REQUEST_NO',0);
                    });
            }




        }

    }

    protected function createFiles($falcon,$data)
    {
        foreach ($data['files'] ?? [] as $file)
        {
            if ($file['file'] ?? null){
                $uploaded_file = uploadFile($file['file'] ,'falcon');
                $file_detail = $falcon->file_details()->create($file);
                $file_detail->getFile()->delete();
                $file_detail->getFile()->create($uploaded_file);
            }

        }

    }

    protected function sendSoapRequest($falcon)
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
                        SubmitFalconAttachment::class,
                        SubmitFalconAttachmentResponse::class,
                    ]);
            });

            $response = $this->soapWrapper->call('Falcon.submitFalconRequest', [
                new SubmitFalconRequest($falcon->type->code, $falcon->P_O_CIVIL_ID,
                    $falcon->P_O_A_NAME, $falcon->P_O_ADDRESS,
                    $falcon->P_O_MOBILE, $falcon->P_O_PASSPORT_NO,
                    $falcon->P_CIVIL_EXPIRY_DT, $falcon->P_O_MAIL,
                    $falcon->P_NW_CIVIL_ID, $falcon->P_NW_A_NAME,
                    $falcon->P_NW_ADDRESS, $falcon->P_NW_MOBILE,
                    $falcon->P_NW_PASSPORT_NO, $falcon->P_NW_CIVIL_EXPIRY,
                    $falcon->P_NW_O_MAIL, $falcon->P_CUR_PASS_FAL,
                    $falcon->P_FAL_SEX, $falcon->P_FAL_SPECIES,
                    $falcon->fal_type->code, $falcon->P_FAL_OTHER_TYPE,
                    $falcon->origin_country->code, $falcon->fal_city->code,
                    $falcon->P_FAL_PIT_NO, $falcon->P_FAL_RING_NO,
                    $falcon->P_FAL_INJ_DATE, $falcon->hospital->code,
                    $falcon->P_PAYMENT_ID, $falcon->P_AMOUNT,
                    $falcon->P_TRANS_ID, $falcon->P_TRACK_ID
                )
            ]);
            $json = json_encode($response);
            $response = json_decode($json,TRUE);
            $falcon->P_OUT_REQUEST_NO = $response['return']['requestNo'] ?? null;
            $falcon->P_STATUS_MSG = $response['return']['statusMsg'] ?? null;
            $falcon->save();

            !$falcon->P_OUT_REQUEST_NO ?: $this->uploadAttachments($falcon);



        }catch (\Exception $exception){

//            dd($exception);
//            $falcon->P_FAL_PIT_NO =  null;
//            $falcon->P_FAL_RING_NO =  null;
//            $falcon->P_FAL_INJ_DATE =  null;
//            $falcon->is_hospital = 0;
//            $falcon->certificate_file = 0;
            $falcon->P_STATUS_MSG = 'لابد من اعادة ارسال الطلب';
            $falcon->save();

        }






    }

    protected function uploadAttachments($falcon)
    {


//        $this->soapWrapper->add('Falcon', function ($service) {
//            $service
//                ->wsdl(env('FALCON_SOAP'))
//                ->trace(true)
//                ->options(['user_agent' => 'PHPSoapClient'])
//                ->classmap([
//                    SubmitFalconAttachment::class,
//                    SubmitFalconAttachmentResponse::class,
//                ]);
//        });

        $arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );

        foreach ($falcon->file_details as $file_detail)
        {
            $content = file_get_contents($file_detail->file, false, stream_context_create($arrContextOptions));

//            dd($content);
            $req = new SubmitFalconAttachment($falcon->P_OUT_REQUEST_NO,
                $file_detail->file_type->label,
                8,
                $content,
                $file_detail->id);


            $response = $this->soapWrapper->call('Falcon.insertFalconAttachments', [
                $req
            ]);
        }

        if ($falcon->certificate_file_path){

            $content = file_get_contents($falcon->certificate_file_path, false, stream_context_create($arrContextOptions));

            $req = new SubmitFalconAttachment($falcon->P_OUT_REQUEST_NO,
                'شهادة تعريف الصقر',
                8,
                $content,
                $falcon->file_details->count()+2);


            $response = $this->soapWrapper->call('Falcon.insertFalconAttachments', [
                $req
            ]);
        }



    }

    protected function getFalconDataSoap($P_O_CIVIL_ID,$P_FAL_PIT_NO)
    {
        $this->soapWrapper->add('Falcon', function ($service) {
            $service
                ->wsdl(env('FALCON_SOAP'))
                ->trace(true)
                ->options(['user_agent' => 'PHPSoapClient'])
                ->classmap([
                    GetFalconDataRequest::class,
                    GetFalconDataResponse::class,
                ]);
        });

        $response = $this->soapWrapper->call('Falcon.getFalconData', [
            new GetFalconDataRequest($P_O_CIVIL_ID,$P_FAL_PIT_NO
            )
        ]);
        $json = json_encode($response);
        $response = json_decode($json,TRUE);
        return $response['return'] ?? null;
//        dd($response);

    }

    protected function getFalconCivilInfoSoap($P_O_CIVIL_ID)
    {
        $this->soapWrapper->add('Falcon', function ($service) {
            $service
                ->wsdl(env('FALCON_SOAP'))
                ->trace(true)
                ->options(['user_agent' => 'PHPSoapClient'])
                ->classmap([
                    GetFalconCivilInfoRequest::class,
                    GetFalconCivilInfoResponse::class
                ]);
        });
        $response = $this->soapWrapper->call('Falcon.getFalconCivilInfo', [
            new GetFalconCivilInfoRequest((float)$P_O_CIVIL_ID),
        ]);
        $json = json_encode($response);
        $response = json_decode($json,TRUE);

        return $response['return'] ?? null;

    }

    protected function insertAttachments($data,$request_number)
    {
        try {

            $arrContextOptions=array(
                "ssl"=>array(
                    "verify_peer"=>false,
                    "verify_peer_name"=>false,
                ),
            );

            if ($data['file'] ?? null)
            {

                $content = file_get_contents($data['file'], false, stream_context_create($arrContextOptions));

                $req = new SubmitFalconAttachment($request_number,
                    "صورة عن البلاغ",
                    8,
                    $content,
                    uniqid());


                $response = $this->soapWrapper->call('Falcon.insertFalconAttachments', [
                    $req
                ]);
            }

        }catch (\Exception $exception)
        {


        }


    }

}
