<?php

namespace App\Http\Controllers;

use App\Poem;
use Illuminate\Http\Request;

class PoemsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          // fatch all the poems from the database and show it in the poems page
          $poems = Poem::latest()->get();
          return view('poems.index', compact('poems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('poems.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $poem = Poem::create([
            'user_id' => auth()->id(),
            'body'  =>request('body'),
            'title' =>request('title')
            

        ]);
        
        return redirect($poem->path());
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Poems  $poems
     * @return \Illuminate\Http\Response
     */
    public function show(Poem $poem)
    {
      return view('poems.show',compact('poem'));
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
    public function update(Request $request, Poem $poem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Poems  $poems
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poem $poem)
    {
        //
    }
}
