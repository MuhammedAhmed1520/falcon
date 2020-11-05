<?php


namespace App\Modules\Option;


use App\Models\Option;

class OptionRepo
{
    private $optionModel;

    public function __construct()
    {
        $this->optionModel = new Option();
    }

    public function getOptionByType($type =null)
    {
        $options = $this->optionModel->all();

        if ($type){
            $options = $options->where('type',$type);
        }
        return return_msg(true,"Success",compact('options'));
    }

}
