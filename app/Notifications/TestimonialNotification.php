<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TestimonialNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $testimonial;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($testimonial)
    {
        $this->testimonial = $testimonial;
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
            ->subject('Send New Testimonial')
            ->line('New Testimonial by '.$this->testimonial->name . ' need to approve.')
            ->line('Email :'.$this->testimonial->email)
            ->line('Designation : '. $this->testimonial->designation)
            ->line('To approve the Testimonial click view button.')
            ->action('View', url(route('admin.testimonial.show',$this->testimonial->id)))
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
            'data' => "New testimonial from" . $this->testimonial['name'] . "need to approve"
        ];
    }
}
