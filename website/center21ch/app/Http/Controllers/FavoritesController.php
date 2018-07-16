<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reply;

class FavoritesController extends Controller


{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(Reply $reply)
    {
    
         $reply->favorite();
         
         return redirect()->back();
    
    }

    public function destroy(Reply $reply)
    {
        return $reply->unfavorite();
    }
}
