<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Poet;
class AuthurAvatarController extends Controller
{
    public function store(Poet $poet)
    {
       
        $this->validate(request(), [
            'avatar' => ['required', 'image']
        ]);
        $poet->update([
            'avatar_path' => request()->file('avatar')->store('avatars', 'public')
        ]);
        return response([], 204);
    }
}