<?php

namespace App;
use App\Poem;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function poems()
    {
        return $this->hasMany(Poem::class);
    }
    
}
