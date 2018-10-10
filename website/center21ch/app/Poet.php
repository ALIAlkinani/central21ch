<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poet extends Model
{
    protected $guarded=[];


    public function path()
    {
        return "/poets/{$this->id}";
    }
}
