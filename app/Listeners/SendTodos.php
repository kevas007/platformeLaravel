<?php

namespace App\Listeners;

use App\Events\Todos;
use App\Mail\TodosMail;
use App\Models\Entreprise;
use App\Models\User;
use App\Notifications\TodosNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class SendTodos implements ShouldQueue
{


    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\Todos  $event
     * @return void
     */
    public function handle(Todos $event)
    {
        $entreprise = Entreprise::find( Arr::get($event->store, 'entreprises_id'))->first();
        // var_dump( $entreprise );
        $user = $entreprise->users;

        Mail::to($user->email)->send(new TodosMail($event->store));
        // Notification::send( $user,new TodosNotification($event->store));
        // var_dump($event->store);
    }
}
