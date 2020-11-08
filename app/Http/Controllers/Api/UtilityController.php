<?php

namespace App\Http\Controllers\Api;

use App\Modules\Option\OptionRepo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UtilityController extends Controller
{

    private $optionRepo;

    public function __construct()
    {
        $this->optionRepo = new OptionRepo();
    }
    public function allOptions($type = null)
    {
        return $this->optionRepo->getOptionByType($type);

    }

}
