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

// SoftDelete
Route::get('/softDelete', 'TestController@showSoftDelete')->name('show.softdelete');
Route::post('/softDelete/store', 'TestController@store')->name('store.softdelete');
Route::get('/{d_id}/softDelete', 'TestController@softdelete')->name('delete.softdelete');
Route::get('/{d_id}/restore', 'TestController@restore')->name('restore.softdelete');

// Relation Table
Route::get('/belongsto','TestController@showBelongsTo')->name('show.belongsto');
// Carbon

Route::get('/carbon','TestController@showCarbon')->name('show.carbon');
Route::post('/carbon/store', 'TestController@storeDate')->name('store.date');

Route::get('/manyto','ManyToController@show')->name('show.manyto');
Route::post('/{id}/manyto','ManyToController@store')->name('store.manyto');
Route::post('/{id}/updatemanyto','ManyToController@update')->name('update.manyto');


