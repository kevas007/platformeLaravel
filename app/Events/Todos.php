<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;

class Todos implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $store, $userId;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($store, $userId)
    {
        $this->store = $store;
        $this->userId = $userId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('App.Models.User.' . $this->userId);
    }

    public function broadcastWith()
    {
        // return [
        //     'type' => 'primary',
        //     'message' => 'You have received a new tasks',
        // ];
    }


    // public function toMail($notifiable)
    // {

    //     return (new MailMessage)
    //                 ->line('Vous avez une tache')
    //                 ->action('Notification Action', url('http://localhost:8081/todos'))
    //                 ->line('Thank you for using our application!');
    // }


}
