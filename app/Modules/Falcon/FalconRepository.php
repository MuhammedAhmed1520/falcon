<?php


namespace App\Modules\Falcon;


use App\Models\Falcon;

class FalconRepository
{
    private $falconModel;

    public function __construct()
    {
        $this->falconModel = new Falcon();
    }
    public function create(array $data)
    {
        $data['user_id'] = auth()->user()->id ?? $data['user_id'] ?? null;
        $falcon = $this->falconModel->create($data);
        return return_msg(true,'Success',compact('falcon'));
    }
    public function update(array $data)
    {

        $falcon = $this->falconModel->find($data['id'] ?? null);
        if (!$falcon){
            return return_msg(false,'Not Found');
        }
        $falcon->update($data);
        return return_msg(true,'Success',compact('falcon'));
    }
    public function show($id)
    {

        $falcon = $this->falconModel->find($id);
        if (!$falcon){
            return return_msg(false,'Not Found');
        }
        $falcon->load(['user']);
        return return_msg(true,'Success',compact('falcon'));
    }
    public function all(array $data = [])
    {
        $falcons = $this->falconModel->with(['user'])->orderBy('id','desc')->get();
        return return_msg(true,'Success',compact('falcons'));
    }

}
