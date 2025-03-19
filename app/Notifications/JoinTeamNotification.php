<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class JoinTeamNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $join_team;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($join_team)
    {
        $this->join_team = $join_team;
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
            ->subject('Send New Join Team Request')
            ->line('New Join Team Request by '.$this->join_team->name)
            ->line('Email :'.$this->join_team->email)
            ->line('Phone : '. $this->join_team->phone)
            ->action('View', url(route('admin.join-team.show',$this->join_team->id)))
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
            'data' => "New join team request from" . $this->join_team['name']
        ];
    }
}
