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
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

}
