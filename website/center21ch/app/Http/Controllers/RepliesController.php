<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;
use App\Poem;
use App\Reply;

use Illuminate\Support\Facades\Gate;

class RepliesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except'=>'index']);
    }
    public function store($channelId, Poem $Poem, CreatePostRequest $form)
    {
     

      return $Poem->addReply([
            'body' => request('body'),
            'user_id'=> auth()->id()
        ])->load('owner');
       
        
       
        
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

    $this->validate(request(), ['body' => 'required|spamfree']);
        $reply->update(request(['body']));

      
   }
   

}
