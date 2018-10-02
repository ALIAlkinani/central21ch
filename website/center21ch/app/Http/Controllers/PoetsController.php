<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poet;

class PoetsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function store(Request $request)
    {
        $poet = Poet::create([
            'first_name' =>request('first_name'),
            'last_name'=>request('last_name'),
            'nationality'  =>request('nationality'),
            'date_of_birth' =>request('date_of_birth'),
            'date_of_death' =>request('date_of_death'),
            'mother_language' => request('mother_language'),
            
           
            


        ]);
        if (request()->wantsJson()) {
            return response($poet, 201);
        }

        return back()->with('flash','The poet has been created!!');

        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('poets.create');
    }



}
