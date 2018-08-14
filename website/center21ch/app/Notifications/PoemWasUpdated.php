<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PoemWasUpdated extends Notification
{
    use Queueable;
    protected $poem , $reply;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($poem, $reply)
    {
        $this->poem = $poem;
        $this->reply = $reply;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

   
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message' => $this->reply->owner->name . ' reply to ' . $this->poem->title,
            'link'=>$this->reply->path(),
        ];
    }
}
