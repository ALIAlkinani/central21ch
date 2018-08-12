<?php

namespace App;
use App\User;
use App\Notifications\PoemWasUpdated;


use Illuminate\Database\Eloquent\Model;

class PoemSubscription extends Model
{
    
    protected $guarded=[];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function poem()
    {
        return $this->belongsTo(Poem::class);

    }

    public function notify($reply){
        $this->user->notify(new PoemWasUpdated($this->poem,$reply));

    }
}
