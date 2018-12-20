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
Route::get('/brief-branding', 'WelcomeController@viewBrief');
Route::get('/gracias', 'WelcomeController@viewGracias');
Route::get('/error', 'WelcomeController@viewError');


Route::get('/pdf', 'WelcomeController@viewPDF');


Route::get('/colombia/branding', 'WelcomeController@viewBrandingcolombia');
Route::get('/usa/branding', 'WelcomeController@viewBrandingusa');
Route::get('/uk/branding', 'WelcomeController@viewBrandinguk');

Route::get('/desarrollo-web', 'WelcomeController@viewWeb');
Route::get('/posicionamiento-seo', 'WelcomeController@viewSeo');
Route::get('/googleadwords-publicidadenfacebook', 'WelcomeController@viewAds');
Route::get('/proyecto/{id}', 'WelcomeController@viewDetailProject');

// Guardar datos formulario de registro
Route::post('/saveRegistro','RegistroController@saveDataRegistro');
// Guardar datos formulario de registro Lead Manual
Route::post('/saveRegistroLead','RegistroController@saveDataRegistroLead');
// Guarda datos de Brief
Route::post('/brief','RegistroController@registroBrief');
Auth::routes();

/* ============================================================
                        Administrador
=============================================================== */

Route::get('/home', 'HomeController@index')->name('home');

// Rutas Administrador
Route::get('/registros', 'HomeController@getRegistros');
Route::get('/registros/recibidos', 'HomeController@getRegistrosRecibido');
Route::get('/registros/proceso', 'HomeController@getRegistrosProceso');
Route::get('/registros/cotizados', 'HomeController@getRegistrosCotizado');
Route::get('/registros/cerrados', 'HomeController@getRegistrosCheck');
Route::get('/registros/no-viables', 'HomeController@getRegistrosClose');
Route::get('/registro/detalle/{id}', 'HomeController@getRegistroDetalle');
Route::get('/registroLead', 'HomeController@getUserData');
Route::get('/ownLeads', 'HomeController@getUserLeads');

Route::post('/api/v1/registro/delete','HomeController@deleteDataRegistroLead');
Route::post('/api/v1/registro/edit','HomeController@editDataRegistroLead');
Route::post('/api/v1/registro/deleteServicie','HomeController@deleteServicieRegistroLead');

// API
Route::get('/api/v1/registros','HomeController@getRegistrosAjax');
Route::get('/api/v1/graficas_semanal','HomeController@getGraficas');

Route::post('/api/v1/solicitud/filterdata','HomeController@getfilterDataRegistros');
Route::post('/api/v1/registro/status','StatusController@saveStatus');
Route::post('/api/v1/registro/medio_contacto','MediosController@saveNotaAndMedio');
Route::get('/api/v1/registrosLatest','HomeController@getRegistrosLastestAjax');
Route::get('/api/v1/graficas_semanal','HomeController@getGraficasSemanal');
Route::get('/api/v1/graficas_mensual','HomeController@getGraficasMensual');
Route::get('/api/v1/graficas_mensual_recibidos','HomeController@getGraficasMensualRecibidos');
Route::get('/api/v1/graficas_mensual_proceso','HomeController@getGraficasMensualProceso');
Route::get('/api/v1/graficas_mensual_cotizados','HomeController@getGraficasMensualCotizados');
Route::get('/api/v1/graficas_mensual_cerrados','HomeController@getGraficasMensualCerrados');
Route::get('/api/v1/graficas_mensual_no_viables','HomeController@getGraficasMensualNoViables');

Route::post('/api/v1/solicitud/filterdata','HomeController@getfilterDataRegistros');

Route::post('/api/v1/registro/update/{id_socio}','HomeController@saveUpdateStatusCompra');


// Función que acompleta los datos de Facebook (Relación con tablas)
// Route::get('/api/v1/saveDatosFacebook','HomeController@saveDataFacebook');

//BOT
Route::get('/updated-activity', 'TelegramBotController@updatedActivity');
