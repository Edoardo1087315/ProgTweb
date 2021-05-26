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
Route::get('/Faq','PublicController@showFaq')
        ->name('Faq');

Route::get('/PagEvento/{idevent}','PublicController@showEvent')
        ->name('Pagina_Evento');

Route::get('/PagEvento/{idevent}/compra','UserController@showBuyForm')
        ->name('Compra_Biglietto')->middleware('can:isSoldout,idevent');

Route::post('/PagEvento/compra/riepilogo','UserController@buyFormProcess')
        ->name('Compra');

Route::post('/catalog','PublicController@search')
        ->name('Ricerca');

Route::get('/AreaRiservata', 'UserController@showAreaRiservata')
        ->name('Area_Utente');

Route::get('/AreaRiservata/Storico', 'UserController@showStorico')
        ->name('Storico');

Route::get('/AreaOrganizzazione','PublicController@showFaq')
        ->name('Area_Organizzazione');

//rotte admin controller

Route::get('/AreaAmministratore', 'AdminController@showAreaAdmin')
        ->name('Area_Admin');

Route::get('/deleteUser/{userid}','AdminController@deleteUser')
        ->name('deleteUser');

Route::post('/modifica','AdminController@modificaCompany')
        ->name('modifica');

// Rotte per l'autenticazione
Route::get('login', 'Auth\LoginController@showLoginForm')
        ->name('Accedi');

Route::post('login', 'Auth\LoginController@login');

Route::post('logout', 'Auth\LoginController@logout')
        ->name('logout');

// Rotte per la registrazione
Route::get('register', 'Auth\RegisterController@showRegistrationForm')
        ->name('Registrati');

Route::post('register', 'Auth\RegisterController@register');
/*
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
 */
