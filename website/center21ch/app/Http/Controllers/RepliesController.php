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
        $Poem->addReply([
            'body' => request('body'),
            'user_id'=> auth()->id()
        ]);

        return back();
        
    }
}
