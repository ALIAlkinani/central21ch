<?php

namespace App;
use App\User;
use App\favorites;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $guarded=[];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function favorites()
    {
      return  $this->morphMany(favorites::class,'favorited');
    }

    public function favorite()
    {
        $user = ['user_id'=>auth()->id()];
        if (!$this->favorites()->where($user)->exists()) {
           return $this->favorites()->create($user);

        }

    }
}
