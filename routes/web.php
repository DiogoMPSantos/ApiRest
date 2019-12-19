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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'LoginController@index')->name('login');

Route::post('/login', 'LoginController@login')->name('user.login');
Route::get('/logout', 'LoginController@logout')->name('user.logout');

Route::group(['prefix' => 'admin', 'middleware'=>'auth'], function () {

    Route::get('users', 'ProjectController@index')->name('admin.index');
    Route::post('create', 'ProjectController@store')->name('admin.create');
    Route::get('link/{id}','ProjectController@addActivities')->name('admin.link-activities');
    Route::get('shows/{id}','ProjectController@showActivities')->name('admin.shows');
    Route::get('delete/{id}','ProjectController@deleteProject')->name('admin.delete');
    Route::post('/create/activity', 'ProjectController@storeActivity')->name('admin.create.activity');

});

