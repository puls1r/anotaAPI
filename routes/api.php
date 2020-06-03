<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/order', 'OrderController@index');
Route::get('/order/{id}', 'OrderController@show');
Route::post('/order', 'OrderController@create');
Route::delete('/order/{id}', 'OrderController@delete');

Route::get('/jenisOrder', 'JenisOrderController@index');

Route::get('/karyawan','KaryawanController@index');
Route::get('/karyawan/{id}','KaryawanController@show'); //karyawan detail
Route::post('/karyawan','KaryawanController@create'); //create karyawan
Route::delete('/karyawan/{idKaryawan}','KaryawanController@delete'); //delete karyawan

    //assign Karyawan ke orderan
    Route::post('/karyawan/assign/{idKaryawan}','KaryawanController@assign');

 //pembayaran   
Route::get('/keuangan', 'KeuanganController@index');
Route::post('/keuangan/bayar/{idAccounting}','KeuanganController@updatepembayaran');

//Route::post('/auth/user', 'AuthController@register');

Route::post('/register', 'Auth\RegisterController@register');
Route::post('/login', 'Auth\LoginController@login');