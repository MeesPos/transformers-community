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

Route::get('finish-onboarding', [\App\Http\Controllers\OnboardController::class, 'finish'])->name('onboarding.finish');

Route::middleware(['auth:sanctum', 'verified', 'is_not_blocked'])->group(function () {
    Route::get('onboarding', [\App\Http\Controllers\OnboardController::class, 'index'])->name('onboarding');
});

Route::middleware(['auth:sanctum', 'verified', 'is_not_blocked', 'completed_onboarding'])->group(function () {
    Route::get('/chat', function () {
        return Inertia::render('Chat/Container');
    })->name('chat');

    Route::get('chat/rooms', [\App\Http\Controllers\ChatController::class, 'rooms']);
    Route::get('chat/room/{roomId}/messages', [\App\Http\Controllers\ChatController::class, 'messages']);
    Route::post('chat/room/{roomId}/message', [\App\Http\Controllers\ChatController::class, 'newMessage']);
    Route::post('search/{query}', [\App\Http\Controllers\SearchController::class, 'search']);
    Route::post('rooms/create/{userId}', [\App\Http\Controllers\ChatController::class, 'createRoom']);
    Route::get('profile', [\App\Http\Controllers\ProfilePictureController::class, 'index']);
    Route::post('profile-picture/delete', [\App\Http\Controllers\ProfilePictureController::class, 'delete'])->name('profile-picture.delete');
    Route::post('profile-picture/upload', [\App\Http\Controllers\ProfilePictureController::class, 'upload'])->name('profile-picture.upload');
});
