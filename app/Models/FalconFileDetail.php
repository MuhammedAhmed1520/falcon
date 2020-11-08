<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FalconFileDetail extends Model
{
    protected $fillable = [
        'file_type_id',
        'falcon_id',
    ];
    protected $appends = ['file'];

    protected $with = ['file_type'];

    public function file_type()
    {
        return $this->belongsTo(Option::class,'file_type_id');
    }
    public function getFile()
    {
        return $this->morphOne(File::class,'fileable');
    }

    public function getFileAttribute()
    {
        $file = $this->getFile()->first();
        if ($file){
            return getFullPathEdit($file->name,'falcon');
        }
        return null;

    }

}
