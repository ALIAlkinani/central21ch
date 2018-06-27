<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Poem extends Model

{

    protected $guarded=[];
    public function path()
    {
        return "/poems/{$this->channel->slug}/{$this->id}";
    }
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    
    public function addReply($reply)
    {
        $this->replies()->create($reply);
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class,'channel_id');
    }

}
