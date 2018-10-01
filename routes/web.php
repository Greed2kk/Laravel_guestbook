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

Route::get('/', function () {
    return view('welcome');
});
 */
//Route::get('/', ['uses' => 'GuestController@index', 'as' => 'guest']);
Route::get('message/{id}/edit', ['uses'=>'GuestController@edit', 'as'=>'message.edit'])->where(['id'=>'[0-9]']);
Route::get('/guestbook', ['uses'=>'GuestController@index', 'as'=>'guestbook']);


Route::post('/add', 'GuestController@add')->name('add');

Route::post('/del', 'GuestController@del')->name('del');
Route::post('/editm', 'GuestController@editm')->name('editm');

Route::post('/editc', 'GuestController@editadd')->name('editadd');

Auth::routes();
Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home']);
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/photo', 'PhotoController@index');
Route::resource('photo', 'PhotoController');
