<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\MainTrait\FalconTrait;
use App\Modules\Falcon\FalconRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FalconController extends Controller
{
    use FalconTrait;

    private $falconRepo;

    public function __construct()
    {
        $this->falconRepo = new FalconRepository();
    }
    public function create(Request $request)
    {
        $validation = $this->validateFalconRequest($request->all());
        if ($validation->fails()){
            return return_msg(false,"validation Errors",[
                "validation_errors" => $validation->getMessageBag()->getMessages(),
            ]);
        }
        return $this->falconRepo->create($request->all());

    }

    public function update(Request $request)
    {
        $validation = $this->validateFalconUpdateRequest($request->all());
        if ($validation->fails()){
            return return_msg(false,"validation Errors",[
                "validation_errors" => $validation->getMessageBag()->getMessages(),
            ]);
        }
        return $this->falconRepo->update($request->all());

    }

    public function show($id)
    {
        return $this->falconRepo->show($id);

    }

    public function all(Request $request)
    {
        return $this->falconRepo->all($request->all());

    }
}
