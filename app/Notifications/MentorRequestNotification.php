<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MentorRequestNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $mentor;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($mentor)
    {
        $this->mentor = $mentor;
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
            ->subject('Send New Mentor Request')
            ->line('New Mentor Request by '.$this->mentor->name . ' need to approve.')
            ->line('Email :'.$this->mentor->email)
            ->line('Phone : '. $this->mentor->phone)
            ->line('To approve the Mentor Request click view button.')
            ->action('View', url(route('admin.mentor-application.show',$this->mentor->id)))
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
            'data' => "New mentor requestt from" . $this->mentor['name'] . "need to approve"
        ];
    }
}
