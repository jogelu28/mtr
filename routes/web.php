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


Route::get('/mi_primer_ruta', function () {
    return 'SI se arma';
});
Route::get('/name/{name}', function ($name) {
    return 'Hola soy'.$name;
});

Route::get('/name/{name}/lastname/{apellido?}', function ($name,$apellido=null) {
    return 'Hola soy '.$name.' '.$apellido;
});

Route::get('/1er/{primero}/2do/{segundo}', function ($primero,$segundo) {
    return 'Resultado '.($primero+$segundo);
});


Route::get('/','HomeController@index');

Route::get('/login', function () {
    return view('login');
});

Route::get('pdfview/{id}','PersonaController@pdfin');

//Route::get('/logout', function () {
//    return 'Logout user';
//});


Route::get('/catalog','catalogcontroller@catalog');

Route::get('/catalog/show/{idp}','catalogcontroller@catalogid');

Route::get('/catalog/create','catalogcontroller@create');

Route::get('/catalog/edit/{ide}','catalogcontroller@edit');

Route::get('rutaprueba','pruebacontroller@prueba2');

Route::resource('/personas','PersonaController');
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('delete/{id}','PersonaController@destroy');

Route::get('personas/{id}','PersonaController@show');

Route::get('descargar-entrenadores','PersonaController@pdf')->name('listado.pdf');

Route::get('descargar-entrenador','PersonaController@pdfin')->name('listadoindividual.pdf');Auth::routes();


//--------------------//
Route::get('pdfview/{id}','TrainerController@pdfin');

Route::resource('/trainers','TrainerController');
Auth::routes();

Route::get('delete/{id}','TrainerController@destroy');

Route::get('trainers/{id}','TrainerController@show');

Route::get('descargar-entrenadores','TrainerController@pdf')->name('listado.pdf');

Route::get('descargar-entrenador','TrainerController@pdfin')->name('listadoindividual.pdf');Auth::routes();
Route::get('/', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'PageController@icons']);
		Route::get('personas', ['as' => 'views.index', 'uses' => 'PersonaController@index']);
		Route::get('personas/{id}', ['as' => 'views.show', 'uses' => 'PersonaController@show']);
		Route::get('delete/{id}', ['uses' => 'PersonaController@destroy']);
		Route::get('create', ['as' => 'views.create', 'uses' => 'PersonaController@create']);
		Route::post('create','PersonaController@store');

		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('personas', ['as' => 'views.index', 'uses' => 'PersonaController@index']);
	
	Route::get('personas/{id}', ['as' => 'views.show', 'uses' => 'PersonaController@show']);
	Route::get('create', ['as' => 'views.create', 'uses' => 'PersonaController@create']);
	Route::post('/create','PersonaController@store');

	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::get('/search', 'Api\SearchController@search')->name('api.search');

Route::get('vuevalidation/form','VueController@index');
Route::post('vuevalidation/form','VueController@store');


