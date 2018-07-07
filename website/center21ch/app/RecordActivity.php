<?php

namespace App;

trait RecordActivity{

    protected static function bootRecordActivity(){
        static::created(function ($poem){

            $poem->recordActivity('created');
        });
       
    }

    protected function recordActivity($event){
        $this->activity()->create([
            'user_id'=>auth()->id(),
            'type'=>$this->getActivityType($event),
       
        ]);
     }
      public function activity()
     {
         return $this->morphMany('App\Activity','subject');
     }

     public function getActivityType($event)
     {
        return $event .'_'. strtolower((new \ReflectionClass($this))->getShortName());
     }
}
