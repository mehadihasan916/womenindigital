<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PahFinderQuestonSubmit extends Notification implements ShouldQueue
{
    use Queueable;

    public $path_finder_question;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($path_finder_question)
    {
        $this->path_finder_question = $path_finder_question;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
            ->greeting('Hello, Admin!')
            ->subject('Send New Path Finder Question Request to approve')
            ->line('New Question by ' . $this->path_finder_question->email . ' need to approve.')
            ->line('To approve the Question click view button.')
            ->action('View', url(route('admin.path-finder-reply.edit',$this->path_finder_question->id)))
            ->line('Thank you For Using Our Application!');
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
            'data' => "New Path Finder Question by" . $this->path_finder_question['email'] . "need to approve"
        ];
    }
}
