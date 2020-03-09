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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['web', 'auth']], function(){

    Route::get('/dashbord', function(){

        if(Auth::user()->role_id ==1){
            return view('Entreprise');
        }elseif(Auth::user()->role_id == 0){
            return view('superAdmin');
        }});

    // Dashboard
    Route::get('/index', 'DashboardController@index')->name('dashbord');

//Employee
    Route::get('/employee/create', 'EmployeeController@create')->name('Employeer.create');
    Route::post('/employeestore', 'EmployeeController@store')->name('Entreprise.Employeer.store');

//superAdmin
    Route::get('/superAdmin', 'SuperAdminController@index')->name('superAdmin.index');
    Route::get('/superAdmin/create', 'SuperAdminController@create')->name('superAdmin.create');
    Route::post('/superAdmin/store', 'SuperAdminController@store')->name('superAdmin.store');

    Route::get('/superAdminEdit/{user}/edit','SuperAdminController@edit')->name('superAdmin.edit');
    Route::patch('/superAdminupdate/{user}','SuperAdminController@update')->name('superAdmin.update');


// superAdmin Entreprise
    Route::get('/superAdmin/Entreprise', 'SuperAdmin\EntrepriseController@index')->name('superAdmin.Entreprise.index');
    Route::get('/superAdmin/Entreprise/create', 'SuperAdmin\EntrepriseController@create')->name('superAdmin.Entreprise.create');
    Route::post('/superAdmin/Entreprise/store', 'SuperAdmin\EntrepriseController@store')->name('superAdmin.Entreprise.store');
//****************
    Route::get('/superAdminEdit/{Entreprise}/edit','SuperAdmin\EntrepriseController@edit')->name('superAdmin.Entreprise.edit');
    Route::patch('/superAdminupdate/{Entreprise}','SuperAdmin\EntrepriseController@update')->name('superAdmin.Entreprise.update');
    Route::delete('/superAdmindestroy/{Entreprise}', 'SuperAdmin\EntrepriseController@destroy')->name('superAdmin.Entreprise.destroy');

//package
    Route::get('/superAdmin/Package', 'SuperAdmin\PackageController@index')->name('superAdmin.Package.index');

//Entreprise
    Route::get('/Entreprise/projet', 'Entreprise\ProjetController@index')->name('projet.index');
    Route::get('/Entreprise/projet/create', 'Entreprise\ProjetController@create')->name('projet.create');
    Route::post('/Entreprise/projet/store', 'Entreprise\ProjetController@store')->name('projet.store');
//Tâche

    Route::get('/Entreprise/tache', 'Entreprise\TacheController@index')->name('tache.index');
    Route::get('/Entreprise/tache/create', 'Entreprise\TacheController@create')->name('tache.create');
    Route::post('/Entreprise/tache/store', 'Entreprise\TacheController@store')->name('tache.store');

//client
    Route::get('/Entreprise/client', 'Entreprise\ClientController@index')->name('client.index');
    Route::get('/Entreprise/client/create', 'Entreprise\ClientController@create')->name('client.create');
    Route::post('/Entreprise/client/store', 'Entreprise\ClientController@store')->name('client.store');









});
