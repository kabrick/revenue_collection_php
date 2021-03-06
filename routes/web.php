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
Route::any('/store_owners/receive_payment/{id}', 'StoreOwnersController@receive_payment');
Route::any('/store_owners/complete_payment', 'StoreOwnersController@complete_payment')->name('store_owners.complete_payment');

Route::any('/settings/edit_fees', 'SettingsController@edit_fees')->name('settings.edit_fees');
Route::any('/settings/save_fees', 'SettingsController@save_fees')->name('settings.save_fees');
Route::any('/settings/edit_penalty_fees', 'SettingsController@edit_penalty_fees')->name('settings.edit_penalty_fees');
Route::any('/settings/save_penalty_fees', 'SettingsController@save_penalty_fees')->name('settings.save_penalty_fees');

Route::any('/reports/payments', 'ReportsController@payments')->name('reports.payments');

Route::any('/penalties/index', 'PenaltyController@index')->name('penalties.index');
