<?php


namespace App\Http\Controllers\Api\MainTrait;


trait FalconTrait
{
    public function validateFalconRequest(array $request_data)
    {
        return validator($request_data, [
            'P_REQUEST_TYP' => 'required',
            'P_O_CIVIL_ID' => 'required_if:P_REQUEST_TYP,1|numeric|digits:12',
            'P_O_A_NAME' => 'required_if:P_REQUEST_TYP,1',
            'P_O_ADDRESS' => 'required_if:P_REQUEST_TYP,1',
            'P_O_MOBILE' => 'required_if:P_REQUEST_TYP,1|numeric|digits:8',
            'P_O_PASSPORT_NO' => 'required_if:P_REQUEST_TYP,1',
            'P_CIVIL_EXPIRY_DT' => 'required_if:P_REQUEST_TYP,1|date',
            'P_O_MAIL' => 'required_if:P_REQUEST_TYP,1',
            'P_NW_CIVIL_ID' => 'required_if:P_REQUEST_TYP,4',
            'P_NW_A_NAME' => 'required_if:P_REQUEST_TYP,4',
            'P_NW_ADDRESS' => 'required_if:P_REQUEST_TYP,4',
            'P_NW_MOBILE' => 'required_if:P_REQUEST_TYP,4',
            'P_NW_PASSPORT_NO' => 'required_if:P_REQUEST_TYP,4',
            'P_NW_CIVIL_EXPIRY' => 'required_if:P_REQUEST_TYP,4',
            'P_NW_O_MAIL' => 'required_if:P_REQUEST_TYP,4',
            'P_CUR_PASS_FAL' => 'required_if:P_REQUEST_TYP,4',
            'P_FAL_SEX' => 'required_if:P_REQUEST_TYP,1|in:M,F',
            'P_FAL_SPECIES' => 'required_if:P_REQUEST_TYP,1',
            'P_FAL_TYPE' => 'required_if:P_REQUEST_TYP,1',
            'P_FAL_OTHER_TYPE' => 'required_if:P_FAL_TYPE,9',
            'P_FAL_ORIGIN_COUNTRY' => 'required_if:P_REQUEST_TYP,1',
            'P_FAL_CITES_NO' => 'required_if:P_REQUEST_TYP,1',
//            'P_FAL_PIT_NO' => 'required',
//            'P_FAL_RING_NO' => 'required_if:P_REQUEST_TYP,1',
//            'P_FAL_INJ_DATE' => 'required_if:P_REQUEST_TYP,1',
            'P_FAL_INJ_HOSPITAL' => 'required_if:P_REQUEST_TYP,1',
            'files' => 'required|array',
            'files.*.file_type_id' => 'required|numeric',
            'files.*.file' => 'required|file',

//            'P_PAYMENT_ID' => '',
//            'P_AMOUNT' => '',
//            'P_TRANS_ID' => '',
//            'P_TRACK_ID'  => '',
        ]);
    }
    public function validateFalconUpdateRequest(array $request_data)
    {
        return validator($request_data, [
            'P_REQUEST_TYP' => 'required',
            'P_O_CIVIL_ID' => 'required_if:P_REQUEST_TYP,1|numeric|digits:12',
            'P_O_A_NAME' => 'required_if:P_REQUEST_TYP,1',
            'P_O_ADDRESS' => 'required_if:P_REQUEST_TYP,1',
            'P_O_MOBILE' => 'required_if:P_REQUEST_TYP,1|numeric|digits:8',
            'P_O_PASSPORT_NO' => 'required_if:P_REQUEST_TYP,1',
            'P_CIVIL_EXPIRY_DT' => 'required_if:P_REQUEST_TYP,1|date',
            'P_O_MAIL' => 'required_if:P_REQUEST_TYP,1',
            'P_NW_CIVIL_ID' => 'required_if:P_REQUEST_TYP,4',
            'P_NW_A_NAME' => 'required_if:P_REQUEST_TYP,4',
            'P_NW_ADDRESS' => 'required_if:P_REQUEST_TYP,4',
            'P_NW_MOBILE' => 'required_if:P_REQUEST_TYP,4',
            'P_NW_PASSPORT_NO' => 'required_if:P_REQUEST_TYP,4',
            'P_NW_CIVIL_EXPIRY' => 'required_if:P_REQUEST_TYP,4',
            'P_NW_O_MAIL' => 'required_if:P_REQUEST_TYP,4',
            'P_CUR_PASS_FAL' => 'required_if:P_REQUEST_TYP,4',
            'P_FAL_SEX' => 'required_if:P_REQUEST_TYP,1|in:M,F',
            'P_FAL_SPECIES' => 'required_if:P_REQUEST_TYP,1',
            'P_FAL_TYPE' => 'required_if:P_REQUEST_TYP,1',
            'P_FAL_OTHER_TYPE' => 'required_if:P_FAL_TYPE,9',
            'P_FAL_ORIGIN_COUNTRY' => 'required_if:P_REQUEST_TYP,1',
            'P_FAL_CITES_NO' => 'required_if:P_REQUEST_TYP,1',
//            'P_FAL_PIT_NO' => 'required',
//            'P_FAL_RING_NO' => 'required_if:P_REQUEST_TYP,1',
//            'P_FAL_INJ_DATE' => 'required_if:P_REQUEST_TYP,1',
            'P_FAL_INJ_HOSPITAL' => 'required_if:P_REQUEST_TYP,1',

            'files' => 'nullable|array',
            'files.*.file_type_id' => 'required|numeric',
            'files.*.file' => 'required|file',

            'id' => 'required',
        ]);
    }

    public function validateFalconUpdateHospitalRequest(array $request_data)
    {
        return validator($request_data, [

            'P_FAL_PIT_NO' => 'required',
            'P_FAL_RING_NO' => 'required_if:P_REQUEST_TYP,1',
            'P_FAL_INJ_DATE' => 'required_if:P_REQUEST_TYP,1',
            'file' => 'required|file',

            'id' => 'required',
        ]);
    }

    public function validateFalconPayRequest(array $request_data)
    {
        return validator($request_data, [

            'P_OUT_REQUEST_NO' => 'required',
            'P_FAL_RING_NO' => 'required_if:P_REQUEST_TYP,1',
            'P_FAL_INJ_DATE' => 'required_if:P_REQUEST_TYP,1',
            'file' => 'required|file',

            'id' => 'required',
        ]);
    }

}
