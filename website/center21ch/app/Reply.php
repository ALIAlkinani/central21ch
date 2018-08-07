<?php

namespace App;
use App\User;
use App\favorites;
use App\Poem;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use favorable, RecordActivity;
    protected $guarded=[];
    protected $with = ['owner','favorites'];
    protected $appends = ['FavoritesCount','isFavorited'];
   

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
public function poem()
{
   return $this->belongsTo(Poem::class);
}

public function path()
{
    return $this->poem->path() . "#reply-".$this->id;
}
protected static function boot(){
    parent::boot();
  
    static::deleting(function($reply){

        $reply->favorites->each->delete();

    });
    static::created(function($reply){

        $reply->poem->increment('replies_count');

    });
    static::deleted(function($reply){

        $reply->poem->decrement('replies_count');

    });
}
}
