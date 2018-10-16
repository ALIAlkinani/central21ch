<?php

namespace App\Http\Controllers;

use App\Poem;
use App\Filters\PoemsFilters;
use App\Channel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Inspections\Spam;
use App\Trending;
use App\Rules\Recaptcha;
use App\Poet;
use App\Translate;

class PoemsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index','show','map','getpoemsT','getpoemsL']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Channel $channel
     * @param PoemsFilters $filters
     * @return \Illuminate\Http\Response
     */
    public function index(Channel $channel, PoemsFilters $filters,Trending $trending)
    {
       
      
        
        $poems = $this->getPoems($channel, $filters);

        if (request()->wantsJson()) {
            return $poems;
            
        }
           
        
        
       
       

          return view('poems.index', [
            'poems' => $poems,
            'trending' => $trending->get(),
           

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Poet $poets)
    {
        $poets = Poet::latest()->get();
        return view('poems.create',compact('poets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Spam $spam, Recaptcha $recaptcha)
    {
           
        
      
        $this->validate($request,[
            'title' => 'required|spamfree',
            'body' => 'required|spamfree',
            'lat' => 'required',
            'lng' => 'required',
            'poet_id'=>'required',
            'language'=>'required',
            //make the sure the the channal id is not null and exists and the database;
            'channel_id' =>'required|exists:channels,id',
            'g-recaptcha-response' => [ $recaptcha]

        ]);
        
        $poem = Poem::create([
            'user_id' => auth()->id(),
            'channel_id'=>request('channel_id'),
            'body'  =>request('body'),
            'title' =>request('title'),
            'lat' => request('lat'),
            'lng' => request('lng'),
            'language'=>request('language'),
            'poet_id' => request('poet_id'),

        ]);
        if (request()->wantsJson()) {
            return response($poem, 201);
        }

        return redirect($poem->path())->with('flash','Your poem has been published')
    ;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Poems  $poems ,channelId
     * @return \Illuminate\Http\Response
     */
    public function show($channelId, Poem $poem, Trending $trending)
    {

        // Rcord that the user visit the page
        // record the timestamp
     
       if(auth()->check()){
        auth()->user()->read($poem);
        
       }
       $poem->increment('visits');
       $trending->push($poem);
      return view('poems.show', compact('poem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Poem  $Poem
     * @return \Illuminate\Http\Response
     */
    public function edit(Poem $poem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Poems  $poems
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Poems  $poems
     * @return \Illuminate\Http\Response
     */
    public function destroy($channel, Poem $poem)
    {
        if($poem->user_id != auth()->id()){
            abort('403','you donot have the premission to do this')   ;         
        }

        $poem->delete();
        
        return redirect('/poems');
        
    }
    public function getPoems(Channel $channel, PoemsFilters $filters)
    {
        $poems = Poem::latest()->filter($filters);
       

        if ($channel->exists) {
            $poems->where('channel_id', $channel->id);
        }

        return $poems->paginate(6);

        
    }
    
    
    /**
     * Update the given poem.
     *
     * @param string $channel
     * @param Poem $poem
     */
    public function update($channel, Poem $poem)
    {
        $this->authorize('update', $poem);
        $poem->update(request()->validate([
            'title' => 'required',
            'body' => 'required'
        ]));
        return $poem;
    }
    public function map()
    {

        $poems = Poem::latest()->get();

      
            return $poems;
            
    
              // $poems = $this->getPoems($channel);

          // fatch all the poems from the database and show it in the poems page

    }
    public function getpoemsT($translates)
    {
      
        $poems = Poem::leftJoin('translates', 'poems.id', '=', 'translates.poem_id')->where('translates.language',$translates)->get();

        return view('poems.translates', compact('poems'));
    }
    public function getpoemsL($language)
    {
      
        $poems = Poem::where('poems.language',$language)->paginate(6);

        return view('poems.languages', compact('poems'));
    }
    
}