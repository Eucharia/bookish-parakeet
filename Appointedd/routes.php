<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('booking', ['as' => 'booking_new', 'uses' => 'BookingController@createBooking']);
Route::post('booking/success', ['uses' => 'BookingController@postBooking']);
Route::get('bookings', ['as' => 'bookings', 'uses' => 'BookingController@getAllBookings']);
Route::get('bookings/{id}', ['as' => 'booking_id', 'uses' => 'BookingController@showBooking']);
Route::get('booking/{id}/edit', ['as' => 'edit_booking', 'uses' => 'BookingController@editBooking']);
Route::get('booking/{id}', 'BookingController@getTime');