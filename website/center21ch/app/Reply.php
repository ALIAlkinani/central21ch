<?php

namespace App;
use App\User;
use App\favorites;
use App\Poem;

use Carbon\Carbon;

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
 /**
     * Determine if the reply was just published a moment ago.
     *
     * @return bool
     */
    public function wasJustPublished()
    {
        return $this->created_at->gt(Carbon::now()->subMinute());
    }
    /**
     * Fetch all mentioned users within the reply's body.
     *
     * @return array
     */
    public function mentionedUsers()
    {
        preg_match_all('/@([\w\-]+)/', $this->body, $matches);
        return $matches[1];
    }
     /**
     * Set the body attribute.
     *
     * @param string $body
     */
     public function setBodyAttribute($body)
    {
        $this->attributes['body'] = preg_replace(
            '/@([\w\-]+)/',
            '<a href="/profile/$1">$0</a>',
            $body
        );
    } 
}
