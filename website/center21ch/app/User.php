<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Notifications\verifyEmail;
use App\Poem;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function verified()
    {
        return $this->token ===null;
    }

    public function sendVerifycationEmail()
    {

        $this->notify(new verifyEmail($this));
        
    
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
        
    public function poems()
        {
        return $this->hasMany(Poem::class)->latest();
        }

}
