<?php

namespace App\Notifications;

use App\Models\Chirp;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;
class ChirpCommented extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(public Chirp $chirp,public $comment_from, public $comment_body, public $comment)
    {
          $this->comment_from=$comment_from;
          $this->comment_body=$comment_body;
          $this->comment=$comment;
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
            ->subject("New Comment From {$this->comment_from}")
            ->line("Hello")
            ->line("You Have A New Comment From {$this->comment_from}")
            ->line("You Chirped on {$this->chirp->created_at}:{$this->chirp->body}")
            ->line("{$this->comment_from} comment on {$this->comment->created_at}:{$this->comment_body}")
            ->action('Go to Chirper', url('/'))
            ->line('Thank you for using our application!');

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
            //
        ];
    }
}
