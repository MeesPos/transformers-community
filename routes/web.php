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

Route::middleware(['auth:sanctum', 'verified'])->get('/chat', function () {
    return Inertia::render('Chat/Container');
})->name('chat');

Route::middleware('auth:sanctum')->get('chat/rooms', [\App\Http\Controllers\ChatController::class, 'rooms']);
Route::middleware('auth:sanctum')->get('chat/room/{roomId}/messages', [\App\Http\Controllers\ChatController::class, 'messages']);
Route::middleware('auth:sanctum')->post('chat/room/{roomId}/message', [\App\Http\Controllers\ChatController::class, 'newMessage']);
Route::middleware('auth:sanctum')->post('search/{query}', [\App\Http\Controllers\SearchController::class, 'search']);
Route::middleware('auth:sanctum')->post('rooms/create/{userId}', [\App\Http\Controllers\ChatController::class, 'createRoom']);
Route::middleware('auth:sanctum')->get('profile-picture', [\App\Http\Controllers\ProfilePictureController::class, 'index']);
Route::middleware('auth:sanctum')->post('profile-picture/delete', [\App\Http\Controllers\ProfilePictureController::class, 'delete'])->name('profile-picture.delete');
Route::middleware('auth:sanctum')->post('profile-picture/upload', [\App\Http\Controllers\ProfilePictureController::class, 'upload'])->name('profile-picture.upload');
