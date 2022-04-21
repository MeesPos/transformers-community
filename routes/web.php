<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return redirect()->route('register');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'is_not_blocked'
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::get('/wrong-age/{status}/{email}/{birth_date}', [\App\Http\Controllers\WrongAgeController::class, 'index'])->name('auth.wrong-age');

Route::get('email-sent', function () {
    return Inertia::render('Auth/EmailSent', [
        'email' => request()->email
    ]);
})->name('auth.email-sent');

Route::prefix('dashboard')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'is_not_blocked'])->group(function () {
    Route::get('chat', [\App\Http\Controllers\ChatsController::class, 'index'])->name('chats.index');
    Route::get('messages', [\App\Http\Controllers\ChatsController::class, 'fetchMessages'])->name('chats.fetch');
    Route::post('messages', [\App\Http\Controllers\ChatsController::class, 'sendMessage'])->name('chats.send-message');
});
