<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewReplyAdded extends Notification
{
    use Queueable;

    public $discussion_recieved;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($discussion)    // receive the discussion as an argument for the constructor method
    {
        $this->discussion_recieved = $discussion;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting('Hello, from TalkSpace')
                    ->line('There is a new reply on the discussion you are you\'re watching.')
                    ->action('view discussion', route('discussion', ['slug' => $this->discussion_recieved->slug]))
                    ->line('Thank you for being part of the discussion on TalkSpace!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    // public function toArray($notifiable)
    // {
    //     return [
    //         //
    //     ];
    // }
}
