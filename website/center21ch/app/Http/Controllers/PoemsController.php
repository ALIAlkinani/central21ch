<?php

namespace App\Http\Controllers;

use App\Poems;
use Illuminate\Http\Request;

class PoemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Poems  $poems
     * @return \Illuminate\Http\Response
     */
    public function show(Poems $poems)
    {
        // fatch all the poems from the database and show it in the poems page
        $poems = Poem::latest()->get();
        return view('poems.index', compact($poems));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Poems  $poems
     * @return \Illuminate\Http\Response
     */
    public function edit(Poems $poems)
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
    public function update(Request $request, Poems $poems)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Poems  $poems
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poems $poems)
    {
        //
    }
}
