<?php

namespace App;
use App\Poem;
use Illuminate\Database\Eloquent\Model;

class Poet extends Model
{
    protected $guarded=[];


    public function path()
    {
        return "/poets/{$this->id}";
    }


    public function poems()
    {
        return $this->hasMany(Poem::class)   ;
    }

    /**
         * Get the path to the user's avatar.
         *
         * @param  string $avatar
         * @return string
         */
        public function getAvatarPathAttribute($avatar)
        {
            if($avatar){
                $path = 'storage/' . $avatar ;
            }else{
               $path =  'images/avatars/default.jpg';
            }
            return asset($path);
        }
    
}
