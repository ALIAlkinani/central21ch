<?php

namespace App;
use App\User;
use App\favorites;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use favorable, RecordActivity;
    protected $guarded=[];
    protected $with = ['owner','favorites'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
