<?php

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

Route::get('/','PagesController@home');
Route::get('/about','PagesController@about');
Route::get('/contact','TicketsController@create');
Route::post('/contact','TicketsController@store');
Route::get('/tickets','TicketsController@index');
Route::get('/ticket/{slug?}', 'TicketsController@show');
Route::get('/ticket/{slug?}/edit','TicketsController@edit');
Route::post('/ticket/{slug?}/edit','TicketsController@update');
Route::post('/ticket/{slug?}/delete','TicketsController@destroy');
Route::get('/sendemail', function (){
    $data = array('name' => "Learning Laravel",);
    Mail::send('emails.welcome', $data, function ($message) 
    {
        $message->from('kamanzima@gmail.com', 'Learning Laravel');
        $message->to('kamanziman@gmail.com')->subject('Learning Laravel test email');
    });
    return "Your email has been sent successfully";
});

Route::post('/comment', 'CommentsController@newComment');
// registration routes
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

//delaing with administration
Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' =>'manager'), function () {
Route::get('users', 'UsersController@index');
});
Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'manager'), function () {
Route::get('users', [ 'as' => 'admin.user.index', 'uses' => 'UsersController@index']);
Route::get('roles', 'RolesController@index');
Route::get('roles/create', 'RolesController@create');
Route::post('roles/create', 'RolesController@store');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
