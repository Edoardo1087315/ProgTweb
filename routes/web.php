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

Route::get('/ModFornServ','PublicController@showModForn')
        ->name('Mod_Fornitura_servizi');

Route::get('/Accedi','PublicController@showAccedi')
        ->name('Accedi');
Route::get('/Registrati','PublicController@showRegistrati')
        ->name('Registrati');


Route::get('/Faq','PublicController@showFaq')
        ->name('Faq');

Route::get('/PagEvento/{idevent}','PublicController@showEvent')
        ->name('Pagina_Evento');

Route::get('/PagEvento/{idevent}/compra','PublicController@showBuyForm')
        ->name('Compra_Biglietto');

Route::post('/catalog','PublicController@search')
        ->name('Ricerca');

Route::get('/Area_Admin','PublicController@showAreaAdmin')
        ->name('Area_Admin');