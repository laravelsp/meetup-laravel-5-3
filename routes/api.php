<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/users', function (Request $request) {
    return Meetup\User::all();
});

Route::get('/send_email', function(Request $request) {
    Mail::to('batata@gmail.com')->send(
        new Meetup\Mail\YourReminder
    );

    return 'Email enviado';
});

Route::get('/send_notification', function (Request $request) {
    Meetup\User::first()->notify(
        new Meetup\Notifications\SendInspiration()
    );

    return 'Notificação enviada';
});
