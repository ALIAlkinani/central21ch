<?php
namespace App\Listeners;
use App\Events\PoemReceivedNewReply;
class NotifySubscribers
{
    /**
     * Handle the event.
     *
     * @param  PoemReceivedNewReply $event
     * @return void
     */
    public function handle(PoemReceivedNewReply $event)
    {
        $poem = $event->reply->Poem;
        $poem->subscriptions
            ->where('user_id', '!=', $event->reply->user_id)
            ->each
            ->notify($event->reply);
    }
}