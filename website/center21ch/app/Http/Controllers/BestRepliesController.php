<?php

namespace App\Http\Controllers;

use App\Reply;

class BestRepliesController extends Controller
{
    /**
     * Mark the best reply for a poem.
     *
     * @param  Reply $reply
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Reply $reply)
    {
        $this->authorize('update', $reply->poem);

        $reply->poem->markBestReply($reply);
    }
}
