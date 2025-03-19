<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
 
class HireMentorNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $hire_mentor;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($hire_mentor)
    {
        $this->hire_mentor = $hire_mentor;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
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
            ->subject('Mentor Hire Request')
            ->line('Mentor Hire Request by '.$this->hire_mentor->name)
            ->line('Email :'.$this->hire_mentor->email)
            ->line('Phone : '. $this->hire_mentor->phone)
            ->line('To View The Mentor Request click view button.')
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
            'data' => "Mentor hire requst from" . $this->hire_mentor['name']
        ];
    }
}
