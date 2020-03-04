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
    if (\Illuminate\Support\Facades\Auth::check()){
        return redirect('/home');
    } else {
        return redirect('login');
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::any('/store_owners/create', 'StoreOwnersController@create')->name('store_owners.create');
Route::any('/store_owners/save', 'StoreOwnersController@save')->name('store_owners.save');
Route::any('/store_owners/view', 'StoreOwnersController@view')->name('store_owners.view');
Route::any('/store_owners/edit/{id}', 'StoreOwnersController@edit');
Route::any('/store_owners/update', 'StoreOwnersController@update')->name('store_owners.update');
