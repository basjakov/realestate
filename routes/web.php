<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','MainController@index')->name('main');
Route::resource('/realtor','RealtorController');
Route::resource('/announcement','AnnouncementController');
Route::post('/announcement','AnnouncementController@search')->name('search');

Route::get('/announcement/hide/{id}','AnnouncementController@hide')->name('hideanct');
Route::get('/announcement/publish/{id}','AnnouncementController@publish')->name('publishanct');
Route::get('/changepassword','RealtorController@password')->name('password');
Route::put('/changepassword/{user_id}','RealtorController@changepassword')->name('changepassword');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


Route::get('/logout', function(){
    Auth::logout();
    return Redirect('/login');
})->name('logout');
