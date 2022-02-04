<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use Illuminate\Support\Facades\Notification;

class NewUserNotification extends Notification  implements  ShouldQueue
{

    use Queueable;

    public $user;
    // public $id;

    public function __construct($user)
    {
        $this->user = $user;
    }
    public function via($notifiable)
    {
        return ['database'];
    }
    public function toArray($notifiable)
    {
        return [
            'user' => $this->user,

        ];
    }
}
