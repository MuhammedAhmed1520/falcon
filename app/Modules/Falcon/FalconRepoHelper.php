<?php


namespace App\Modules\Falcon;


trait FalconRepoHelper
{

    protected function filterFalcon(&$model,$data)
    {
        if ($data['hospital_id'] ?? null)
        {
            $model->where('P_FAL_INJ_HOSPITAL',$data['hospital_id']);

        }

    }

    protected function createFiles($falcon,$data)
    {
        foreach ($data['files'] as $file)
        {
            if ($file['file'] ?? null){
                $uploaded_file = uploadFile($file['file'] ,'falcon');
                $file_detail = $falcon->file_details()->create($file);
                $file_detail->getFile()->delete();
                $file_detail->getFile()->create($uploaded_file);
            }

        }

    }

}
