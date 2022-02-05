<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TodosNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $store;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($store)
    {
        $this->store = $store;
        // var_dump($this->store);
    }
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */

    public function via($notifiable)
    {
        return ['database'];
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
        ->greeting('Hello,')
        ->line('Welcome to Codelapan.')
        ->action('Explore',  url('http://localhost:8081/todos'))
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
            'tache' => $this->store->tache,
        ];
    }


}
