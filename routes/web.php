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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AccountController@admin');
Route::get('/makeAcc', 'AccountController@createAccount');
Route::get('/', 'AccountController@admin');
Route::get('/transfer', 'OperationController@new_transfer');
Route::get('/history', 'OperationController@history');
Route::post('/makeTransfer', 'OperationController@makeTransfer');
Route::get('/myAccount', 'AccountController@showMe');

