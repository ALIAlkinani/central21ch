<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poem;
use App\Reply;

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
