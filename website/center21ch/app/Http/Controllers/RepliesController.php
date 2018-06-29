<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poem;

class RepliesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store($channelId, Poem $Poem)
    {
        $this->validate(request(),[
            'body' => 'required',
           
        ]);
        $Poem->addReply([
            'body' => request('body'),
            'user_id'=> auth()->id()
        ]);

        return back();
        
    }
}
