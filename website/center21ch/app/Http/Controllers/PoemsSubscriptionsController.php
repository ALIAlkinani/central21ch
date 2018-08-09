<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poem;

class PoemsSubscriptionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store($channelId , Poem $poem)
    {
       $poem->subscribe();
    }
    public function destroy($channelId, Poem $poem){

        $poem->unSubscribe();
    }
}
