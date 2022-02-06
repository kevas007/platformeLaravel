<?php

namespace App\Providers;

use App\Events\Todos;
use App\Listeners\SendNewUserNotification;
use App\Listeners\SendTodos;
use App\Notifications\NewTodo;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
            SendNewUserNotification::class,
            Notif::class,
            Todos::class,
            NewTodo::class,
        ],
        Todos::class=> [
            SendTodos::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
