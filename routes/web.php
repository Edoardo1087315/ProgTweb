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

Route::get('/catalog/search','PublicController@processSearch')
        ->name('processingSearch');

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

Route::post('/PagEvento/compra/process','UserController@buyForm')
        ->name('Compra');

Route::get('/PagEvento/compra/riepilogo','UserController@buyFormProcess')
        ->name('Riepilogo');

Route::get('/AreaRiservata/{user}', 'UserController@showAreaRiservata')
        ->name('Area_Utente');

Route::post('/AreaRiservata/{user}','UserController@updateUser')
        ->name('Modifica_Utente');

Route::get('/AreaRiservata/{user}/Storico', 'UserController@showStorico')
        ->name('Storico');

Route::post('/PagEvento/Partecipero', 'UserController@partecipero')
        ->name('Partecipero');

Route::post('/PagEvento/AnnullaPartecipazione', 'UserController@annullaPartecipazione')
        ->name('Annulla_Partecipazione');

/*ROTTE DELL'UTENTE DI LIVELLO 3*/

Route::get('/AreaOrganizzazione', 'CompanyController@showAreaOrg')
        ->name('Area_Organizzazione');

Route::post('/AreaOrganizzazione/modifica', 'CompanyController@updateEvent')
        ->name('updateEvent');

Route::post('/AreaOrganizzazione/add', 'CompanyController@storeEvent')
        ->name('store_event');

Route::post('/AreaOrganizzazione/deleteEvent', 'CompanyController@deleteEvent')
        ->name('deleteEvent');

Route::get('/AreaOrganizzazione/getEventToUpdate/{id}', 'CompanyController@getEventToUpdate')
        ->name('getEventToUpdate');
        


/*ROTTE DELL'UTENTE DI LIVELLO 4*/

Route::get('/AreaAmministratore', 'AdminController@showAreaAdmin')
        ->name('Area_Admin');

Route::get('/AreaAmministratore/FaqAdmin','AdminController@showAdminFaq')
        ->name('Faq_Admin');

Route::post('/AreaAmministratore/delete_user','AdminController@deleteUser')
        ->name('delete_user');

Route::post('/AreaAmministratore/update_company{companyid}','AdminController@updateCompanyRequest')
        ->name('update_company');

Route::post('/AreaAmministratore/new_company','AdminController@newCompanyRequest')
        ->name('new_company');

Route::get('/AreaAmministratore/update_company/{companyid}','AdminController@getCompanyToUpdate')
        ->name('company_to_update');

Route::post('/AreaAmministratore/modificaFaq','AdminController@getFaqToUpdate')
        ->name('modificaFaq');

Route::post('/deleteFaq', 'AdminController@getFaqToDelete')
        ->name('FaqToDelete');

Route::post('/new_faq','AdminController@newFaqRequest')
        ->name('newFaq');



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
