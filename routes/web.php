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

Route::get('/','PublicController@showHome')
        ->name('frontpage');

Route::get('/catalog','PublicController@showCatalog')
        ->name('catalog');

Route::get('/ModAdesione','PublicController@showModAdes')
        ->name('Mod_Adesione');