<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poem;
use App\Reply;

class RepliesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except'=>'index']);
    }
    public function store($channelId, Poem $Poem)
    {
        $this->validate(request(),[
            'body' => 'required',
           
        ]);
        $reply = $Poem->addReply([
            'body' => request('body'),
            'user_id'=> auth()->id()
        ]);
        if(request()->expectsJson()){
            return $reply->load('owner');

        }

        return back()->with('flash','your reply has been left');
        
    }
public function index($channelId, Poem $Poem)
{
    return $Poem->replies()->paginate(5);
}
   public function destroy(Reply $reply){
      
    $this->authorize('update',$reply);
       
       $reply->delete();
       if(request()->expectsJson()){
           return response(['status'=>'Reply deleted']);
       }

       return back();
   }
   public function update(Reply $reply){
      
    $this->authorize('update',$reply);
       
       $reply->update(request(['body']));

       
   }
}
