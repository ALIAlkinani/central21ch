<?php


namespace App\Listeners;
use App\Events\PoemReceivedNewReply;
use App\Notifications\YouWereMentioned;
use App\User;
class NotifyMentionedUsers
{
    /**
     * Handle the event.
     *
     * @param  PoemReceivedNewReply $event
     * @return void
     */
    public function handle(PoemReceivedNewReply $event)
    {
        collect($event->reply->mentionedUsers())
            ->map(function ($name) {
                return User::where('name', $name)->first();
            })
            ->filter()
            ->each(function ($user) use ($event) {
                $user->notify(new YouWereMentioned($event->reply));
            });
    }
}