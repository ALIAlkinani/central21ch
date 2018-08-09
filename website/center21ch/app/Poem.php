<?php

namespace App;
use App\User;
use App\Filters;


use Illuminate\Database\Eloquent\Model;

class Poem extends Model

{

    use RecordActivity;

    protected $guarded=[];
    protected $with=['creator','channel'];
    protected $appends = ['isSubscribedTo'];


    public function path()
    {
        return "/poems/{$this->channel->slug}/{$this->id}";
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
       return $this->replies()->create($reply);
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
    }
    public function subscribe($userid = null)
    {


        $this->subscriptions()->create([

            'user_id'=> $userid ?: auth()->id()

        ]);
        
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
        
    }
    


