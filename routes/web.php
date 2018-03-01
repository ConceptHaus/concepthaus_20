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

// Route::get('/registros', 'WelcomeController@home');

Route::get('/', 'WelcomeController@viewHome');
Route::get('/crew', 'WelcomeController@viewCrew');
Route::get('/conceptHaus', 'WelcomeController@viewConceptHaus');
Route::get('/inhaus', 'WelcomeController@viewInHaus');
Route::get('/treehaus', 'WelcomeController@viewTreeHaus');
Route::get('/startups', 'WelcomeController@viewStartups');
Route::get('/branding', 'WelcomeController@viewBranding');

// Guardar datos formulario de registro
Route::post('/saveRegistro','RegistroController@saveDataRegistro');

Auth::routes();

/* ============================================================
                        Administrador
=============================================================== */

Route::get('/home', 'HomeController@index')->name('home');

// Rutas Administrador
Route::get('/registros', 'HomeController@getRegistros');
Route::get('/registros/proceso', 'HomeController@getRegistrosProceso');
Route::get('/registros/cotizado', 'HomeController@getRegistrosCotizado');
Route::get('/registros/socios', 'HomeController@getRegistrosCheck');
Route::get('/registros/no-viables', 'HomeController@getRegistrosClose');
Route::get('/registro/detalle/{id}', 'HomeController@getRegistroDetalle');


// API
Route::get('/api/v1/registros','HomeController@getRegistrosAjax');
Route::get('/api/v1/graficas_semanal','HomeController@getGraficas');

Route::post('/api/v1/solicitud/filterdata','HomeController@getfilterDataRegistros');
Route::post('/api/v1/registro/status','StatusController@saveStatus');
Route::post('/api/v1/registro/medio_contacto','MediosController@saveNotaAndMedio');
Route::get('/api/v1/registrosLatest','HomeController@getRegistrosLastestAjax');
Route::get('/api/v1/graficas_semanal','HomeController@getGraficasSemanal');
Route::get('/api/v1/graficas_mensual','HomeController@getGraficasMensual');
Route::post('/api/v1/solicitud/filterdata','HomeController@getfilterDataRegistros');

Route::post('/api/v1/registro/update/{id_socio}','HomeController@saveUpdateStatusCompra');


// Función que acompleta los datos de Facebook (Relación con tablas)
// Route::get('/api/v1/saveDatosFacebook','HomeController@saveDataFacebook');