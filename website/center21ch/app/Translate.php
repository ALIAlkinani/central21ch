<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translate extends Model
{


    protected $guarded=[];
    protected $with = ['owner'];
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function poem()
{
   return $this->belongsTo(Poem::class);
}


protected static function boot(){
    parent::boot();
  
    
    static::created(function($transalte){

        $transalte->poem->increment('translates_count');

    });
    static::deleted(function($transalte){

        $transalte->poem->decrement('translates_count');

    });
}
}
