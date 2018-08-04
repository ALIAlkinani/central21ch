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
        static::addGlobalScope('replyCount', function ($builder){
            $builder->withCount('replies');
        });

        static::deleting(function($poem){

            $poem->replies->each->delete();

        });
    }
        
    }
    


