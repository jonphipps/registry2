<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class QA_EmailNotification extends Notification
{
    use Queueable;

    public function __construct($data)
    {
        $this->data = $data;
    }
    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return $this->getMessage();
    }

    public function getMessage()
    {
        return (new MailMessage)
            ->subject(config('app.name') . ': entry ' . $this->data["action"] . ' in ' . $this->data['crud_name'])
            ->greeting('Hi,')
            ->line('we would like to inform you that entry has been ' . $this->data["action"] . ' in ' . $this->data['crud_name'])
            ->line('Please log in to see more information.')
            ->action(config('app.name'), url(env('APP_URL')))
            ->line('Thank you')
            ->line(config('app.name') . ' Team')
            ->salutation(" ");
    }

}
