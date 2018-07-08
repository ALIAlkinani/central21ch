<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilesController extends Controller
{
  public function show(User $user)
  {
      return view('profile.show', [
          'profileUser' =>$user,
          'activities' => $this->getactivite($user)
      ]);
  }

  public function getactivite($user)
  {
   return $user->activites()->latest()->with('subject')->take(20)->get()->groupBy(function($activity){
      $activity->created_at->format('Y-M-d');

    });
  }
}
