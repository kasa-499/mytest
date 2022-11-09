<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDataController;

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
    return view('index');
})
->name('index');
Route::get('/contact', 'App\Http\Controllers\UserDataController@contact')->name('contact');
//確認ページ
Route::post('/confirm', 'App\Http\Controllers\UserDataController@confirm')->name('confirm');
//送信完了ページ
Route::post('/complete', 'App\Http\Controllers\UserDataController@complete')->name('complete');
//編集ページ
Route::get('/edit/{id}', 'App\Http\Controllers\UserDataController@edit')->name('edit');
//情報更新
Route::post('/update/{id}', 'App\Http\Controllers\UserDataController@update')->name('update'); 
//削除
Route::get('/delete/{id}', 'App\Http\Controllers\UserDataController@delete')->name('delete'); 