<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poem;

class LockedPoemsController extends Controller
{
/**
     * Lock the given poem.
     *
     * @param \App\Poem $poem
     */
    public function store(Poem $poem)
    {
        $poem->lock();
    }

    /**
     * Lock the given poem.
     *
     * @param \App\Poem $poem
     */
     public function destroy(Poem $poem)
    {
        $poem->unlocked();
    }
}
