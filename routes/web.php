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
Route::get('/',function(){
    return view ('home');
})->name('home');

Route::get('/softDelete', 'TestController@showSoftDelete')->name('show.softdelete');
Route::post('/softDelete/store', 'TestController@store')->name('store.softdelete');
Route::get('/{d_id}/softDelete', 'TestController@softdelete')->name('delete.softdelete');
Route::get('/{d_id}/restore', 'TestController@restore')->name('restore.softdelete');


Route::get('/belongsto','TestController@showBelongsTo')->name('show.belongsto');