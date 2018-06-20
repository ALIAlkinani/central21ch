<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poem extends Model
{
    public function path()
    {
        return '/poems/'. $this->id;
    }
}
