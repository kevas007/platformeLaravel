<?php

namespace App\Providers;

use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
    $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
    // $event->menu->add('MAIN NAVIGATION');
    $event->menu->add([
    'text' => '',
    'url' => 'admin/notification',
    'icon' => 'fas fa-bell',
    'label' => Auth::user()->unreadNotifications->count(),
    'label_color' => 'success',
    'topnav_right' => true,
    ]);
    });
    }
 }
