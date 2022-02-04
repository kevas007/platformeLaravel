<?php
namespace App\Listeners;

use App\Models\User;
use App\Notifications\NewUserNotification;
use Illuminate\Support\Facades\Notification;

class SendNewUserNotification
{
    public function handle($event)
    {
        $users = User::find(1);
        // Notification::send($users, new NewUserNotification($event->user));
        $users->notify(new NewUserNotification($event->user));

    }
}
