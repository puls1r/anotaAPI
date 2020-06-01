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

Route::get('/karyawan','Karyawan\KaryawanController@index');
Route::get('/karyawan/{id}','Karyawan\KaryawanController@show'); //karyawan detail
Route::post('/karyawan','Karyawan\KaryawanController@store'); //create karyawan
Route::delete('/karyawan/delete/{idKaryawan}','Karyawan\KaryawanController@destroy'); //delete karyawan

    //assign Karyawan ke orderan
    Route::post('/karyawan/assign/{idKaryawan}','Karyawan\ProgressKaryawanController@assign');

 //pembayaran   
Route::post('/keuangan/bayar/{idAccounting}','KeuanganController@updatepembayaran');

