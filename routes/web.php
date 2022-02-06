<?php
use App\Models\Entreprise;
use App\Events\WebsocketDemoEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Broadcasting\BroadcastController;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/notification', function () {
    $user = App\Models\User::find(1);
    $test=$user->notifications;
    $entreprise = Entreprise::all();

    foreach ($user->unreadNotifications as $notification) {
        $notification->markAsRead();
    }

return view('backend.partials.notification',compact('test', 'entreprise'));
});
Broadcast::routes();
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/message',[App\Http\Controllers\MessageController::class, 'index'])->name('message');
Route::get('/tache',[App\Http\Controllers\TacheController::class, 'create'])->name('tache');
Route::post('/tache',[App\Http\Controllers\TacheController::class, 'store']);
Route::get('/alltodos', [App\Http\Controllers\TacheController::class, 'index'])->name('alltodos');
Route::get('/show/{id}', [App\Http\Controllers\TacheController::class, 'shows']);
Route::get('/message/show/{id}', [App\Http\Controllers\MessageController::class, 'show']);
Route::post('/message/{id}', [App\Http\Controllers\MessageController::class,'store']);
// Auth::routes();
// Route::post("broadcasting/auth", [BroadcastController::class, 'authenticate']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get("login-register",    [App\Http\Controllers\SocialiteController::class, 'loginRegister']);
Route::get("redirect/{provider}", [App\Http\Controllers\SocialiteController::class, 'redirect'])->name('socialite.redirect');
Route::get("callback/{provider}",[App\Http\Controllers\SocialiteController::class, 'callback'])->name('socialite.callback');

