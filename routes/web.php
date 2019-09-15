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
Route::get('/', function () {
    return view('home');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Todo Resources
Route::resource('todo', 'TodoController', ['middleware' => 'auth']);
Route::put('todo/changeStatus/{id}', ['as' => 'changeStatus', 'uses' => 'TodoController@changeStatus']);
