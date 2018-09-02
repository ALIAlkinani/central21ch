<?php

namespace App;
use App\User;
use App\Filters;
use App\Events\PoemReceivedNewReply;

use Illuminate\Database\Eloquent\Model;

class Poem extends Model

{

    use RecordActivity;

    protected $guarded=[];
    protected $with=['creator','channel'];
    protected $appends = ['isSubscribedTo'];


    public function path()
    {
        return "/poems/{$this->channel->slug}/{$this->slug}";
    }
    public function replies()
    {
        return $this->hasMany(Reply::class)   ;
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function addReply($reply)
    {
       $reply=  $this->replies()->create($reply);

       event(new PoemReceivedNewReply($reply));

       //prepare notifications for all subscriber
        $this->subscriptions->filter(function($sub) use($reply){

            return $sub->user_id != $reply->user_id ;


        })
        ->each->notify($reply);

       
       return $reply;


    }

    public function channel()
    {
        return $this->belongsTo(Channel::class,'channel_id');
    }

    /**
     * @param $query
     * @param $filters
     * @return mixed
     */
    public function scopeFilter($query, $filters){

        return $filters->apply($query);

    }
    protected static function boot(){
        parent::boot();
     

        static::deleting(function($poem){

            $poem->replies->each->delete();

        });
        static::created(function ($poem) {
            $poem->update(['slug' => $poem->title]);
        });
    }
    public function subscribe($userid = null)
    {


        $this->subscriptions()->create([

            'user_id'=> $userid ?: auth()->id()

        ]);
        return $this;
        
    }
    public function subscriptions(){

        return $this->hasMany(PoemSubscription::class);

    }
     public function unSubscribe($userid =  null)
    {
       return $this->subscriptions()->where('user_id', $userid ?: auth()->id())->delete();
      

        
    }
    public function getisSubscribedToAttribute()
    {
       return $this->subscriptions()->where('user_id', auth()->id())->exists();
             
    }
    public function hasUpdatesFor(){
        //look in the cash for the proper Key
        //compare carbon instance with the $poem updated
            if(auth()->check()){
              $key = auth()->user()->visitedPoemCacheKey($this);
                return $this->updated_at > cache($key);
    }
    return false;

    }
    
    /**
     * Get the route key name.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
     /**
     * Set the proper slug attribute.
     *
     * @param string $value
     */
    public function setSlugAttribute($value)
    {
        if (static::whereSlug($slug = str_slug($value))->exists()) {
            $slug = "{$slug}-" . md5($this->id);
        }
        $this->attributes['slug'] = $slug;
    }
    public function markBestReply(Reply $reply)
    {
        $this->update(['best_reply_id' => $reply->id]);
    }
    }
    


