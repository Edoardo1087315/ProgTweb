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
/*ROTTE PUBBLICHE*/
Route::get('/','PublicController@showHome')
        ->name('frontpage');

Route::get('/catalog','PublicController@showCatalog')
        ->name('catalog');

Route::post('/catalog','PublicController@search')
        ->name('Ricerca');

Route::get('/ModAdesione','PublicController@showModAdes')
        ->name('Mod_Adesione');

Route::get('/ModFornServ','PublicController@showModForn')
        ->name('Mod_Fornitura_servizi');

Route::get('/Faq','PublicController@showFaq')
        ->name('Faq');

Route::get('/PagEvento/{idevent}','PublicController@showEvent')
        ->name('Pagina_Evento');


/*ROTTE DELL'UTENTE DI LIVELLO 2*/
Route::get('/PagEvento/{idevent}/compra','UserController@showBuyForm')
        ->name('Compra_Biglietto')->middleware('can:isSoldout,idevent');

Route::post('/PagEvento/compra/riepilogo','UserController@buyFormProcess')
        ->name('Compra');

Route::get('/AreaRiservata/{user}', 'UserController@showAreaRiservata')
        ->name('Area_Utente');

Route::post('/AreaRiservata/{user}','UserController@updateUser')
        ->name('Modifica_Utente');

Route::get('/AreaRiservata/{user}/Storico', 'UserController@showStorico')
        ->name('Storico');


/*ROTTE DELL'UTENTE DI LIVELLO 3*/

Route::get('/AreaOrganizzazione', 'CompanyController@showAreaOrg')
        ->name('Area_Organizzazione');

Route::post('/AreaOrganizzazione/modifica', 'CompanyController@updateEvent')
        ->name('updateEvent');

Route::post('/AreaOrganizzazione/add', 'CompanyController@storeEvent')
        ->name('store_event');

Route::get('/AreaOrganizzazione/deleteEvent/{id}', 'CompanyController@deleteEvent')
        ->name('deleteEvent');

Route::get('/AreaOrganizzazione/getEventToUpdate/{id}', 'CompanyController@getEventToUpdate')
        ->name('getEventToUpdate');
        


/*ROTTE DELL'UTENTE DI LIVELLO 4*/

Route::get('/AreaAmministratore', 'AdminController@showAreaAdmin')
        ->name('Area_Admin');

Route::get('/deleteUser/{userid}','AdminController@deleteUser')
        ->name('deleteUser');

Route::post('/modifica','AdminController@modificaCompany')
        ->name('modifica');



/*ROTTE PER L'AUTENTICAZIONE*/
Route::get('login', 'Auth\LoginController@showLoginForm')
        ->name('Accedi');

Route::post('login', 'Auth\LoginController@login');

Route::post('logout', 'Auth\LoginController@logout')
        ->name('logout');



/*ROTTE PER LA REGISTRAZIONE*/
Route::get('register', 'Auth\RegisterController@showRegistrationForm')
        ->name('Registrati');

Route::post('register', 'Auth\RegisterController@register');
/*
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
 */
