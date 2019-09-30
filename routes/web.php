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

Route::get('/', 'TestController@index');
Route::post('/store', 'TestController@store')->name('store.dossier');
Route::get('/{d_id}/softDelete', 'TestController@softdelete')->name('softDelete.dossier');
Route::get('/{d_id}/restore', 'TestController@restoreSoftdelete')->name('restore.dossier');
