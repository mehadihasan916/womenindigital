<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AmbassadorRequestNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $ambassador;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($ambassador)
    {
        $this->ambassador = $ambassador;
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
            ->subject('Send New Ambassador Request')
            ->line('New Ambassador Request by '.$this->ambassador->name . ' need to approve.')
            ->line('Email :'. $this->ambassador->email)
            ->line('Phone : '. $this->ambassador->phone)
            ->line('To approve the Ambassador Request click view button.')
            ->action('View', url(route('admin.ambassador-application.show',$this->ambassador->id)))
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
            'data' => "New ambassador request by" . $this->ambassador['name'] . "need to approve"
        ];
    }
}
