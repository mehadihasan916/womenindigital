<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class HireAmbassadorNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $hire_ambassador;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($hire_ambassador)
    {
        $this->hire_ambassador = $hire_ambassador;
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
            ->subject('Ambassador Hire Request')
            ->line('Ambassador Hire Request by '.$this->hire_ambassador->name)
            ->line('Email :'.$this->hire_ambassador->email)
            ->line('Phone : '. $this->hire_ambassador->phone)
            ->line('To View The Ambassador Request click view button.')
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
            'data' => "Hire ambassador request from" . $this->hire_ambassador['name']
        ];
    }
}
