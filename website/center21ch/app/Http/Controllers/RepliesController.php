<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;
use App\Poem;
use App\Reply;
use App\Inspections\Spam;
use Illuminate\Support\Facades\Gate;

class RepliesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except'=>'index']);
    }
    public function store($channelId, Poem $Poem ,Spam $spam)
    {
        if (Gate::denies('create', new Reply)) {
            return response(
                'You are posting too frequently. Please take a break. :)', 429
            );
        }
       
        try{
        $this->validateReply();

        $reply = $Poem->addReply([
            'body' => request('body'),
            'user_id'=> auth()->id()
        ]);
        }catch(\Exception $e){

            return response("Sorry, your reply Could not be save at this time",422 );


           

        }
    
        return $reply->load('owner');
       
        
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
   public function update(Reply $reply, Spam $spam){

    $this->authorize('update',$reply);
      try{
        $this->validateReply();

        $reply->update(request(['body']));

      }catch(\Exception $e){
        return response(
            'Sorry, your reply could not be saved at this time.', 422
        );
      }
      
       

       
   }
   public function validateReply()
    {
        $this->validate(request(),[
            'body' => 'required',
           
        ]);
        resolve(Spam::class)->detect(request('body'));
        
    }

}
