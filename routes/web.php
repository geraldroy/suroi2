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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/search', 'HomeController@search')->name('search');
Route::resources([
    'agencies' => 'AgencyController',
    'customers' => 'CustomerController',
    'packages' => 'PackageController',
    'transactions' => 'TransactionController'
]);
Route::get('packages/{package}/book', array('as' => 'packages.book', 'uses' => 'PackageController@book'));
Route::get('transactions/{transaction}', array('as' => 'transactions.cancel', 'uses' => 'TransactionController@cancel'));
