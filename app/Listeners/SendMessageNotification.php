<?php

namespace App\Listeners;

use App\Events\WebsocketDemoEvent;
use App\Models\Entreprise;
use App\Models\User;
use App\Notifications\InvoicePaid;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class SendMessageNotification implements ShouldQueue
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
     * @param  \App\Events\WebsocketDemoEvent  $event
     * @return void
     */
    public function handle(WebsocketDemoEvent $event)
    {
        // var_dump();
        if (Arr::get($event->message, 'user_id')== 1) {

            $entreprise = Entreprise::find(Arr::get($event->message, 'entreprise_id'));
            $user = User::find($entreprise->users_id);

            FacadesNotification::send($user, new InvoicePaid($event->message));
        } else {
            // $entreprise= Entreprise::find(Arr::get($event->message, 'entreprise_id'));
            // $user =User::find($entreprise->users_id);
            FacadesNotification::send(User::find(1), new InvoicePaid($event->message));
        }
    }
}
