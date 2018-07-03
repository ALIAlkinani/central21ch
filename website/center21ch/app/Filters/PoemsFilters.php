<?php

namespace App\Filters;
use App\User;
use Illuminate\Http\Request;
class PoemsFilters extends Filters
{
    protected $filters = ['by','popularity'];

    public function by($username)
    {
        $user = User::where('name', $username)->firstOrFail();

            return $this->builder->where('user_id', $user->id);
    }

    public function popularity()
    {
        $this->builder->getQuery()->orders=[];

            return $this->builder->orderBy('replies_count', 'desc');
    }



}