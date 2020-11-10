<?php


namespace App\Modules\Falcon;


use App\Soap\Request\SubmitFalconRequest;
use App\Soap\Response\SubmitFalconRequestResponse;

trait FalconRepoHelper
{

    protected function filterFalcon(&$model,$data)
    {

        $data['user_id'] = $data['user_id'] ?? auth('civil')->user()->id ?? null;
        if ($data['hospital_id'] ?? null)
        {
            $model->where('P_FAL_INJ_HOSPITAL',$data['hospital_id'])
                ->whereNull('P_FAL_PIT_NO')
                ->whereNull('P_FAL_RING_NO')
                ->whereNull('P_FAL_INJ_DATE')
            ;

        }
        if ($data['user_id'] ?? null)
        {
            $model->where('user_id',$data['user_id']);

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
        $this->soapWrapper->add('Falcon', function ($service) {
            $service
                ->wsdl('http://eprocesstest1.epa.org.kw:7002/FalconWebServices-FalconWebServices-context-root/FalconWebservicePort?WSDL')
                ->trace(true)
                ->options(['user_agent' => 'PHPSoapClient'])
                ->classmap([
                    SubmitFalconRequest::class,
                    SubmitFalconRequestResponse::class,
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
//        $e = simplexml_load_string($response);
        $json = json_encode($response);
        $response = json_decode($json,TRUE);

        $falcon->P_OUT_REQUEST_NO = $response['return']['requestNo'] ?? null;
        $falcon->P_STATUS_MSG = $response['return']['statusMsg'] ?? null;
        $falcon->save();

    }

}
