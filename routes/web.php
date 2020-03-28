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
//Employee login
Route::prefix('employee')->group(function () {
    Route::get('/login', 'Auth\EmployeeController@showLoginForm')->name('employee.login');
    Route::post('/login', 'Auth\EmployeeController@login')->name('employee.login.submit');
    Route::post('logout/', 'Auth\EmployeeController@logout')->name('employee.logout');

    Route::group(['middleware' => 'auth.employee'], function () {
        Route::get('/tasks', 'employee\TaskController@index')->name('employee.tasks');
    });
});


Route::group(['middleware' => ['web', 'auth']], function () {

    Route::get('/dashbord', function () {

        if (Auth::user()->role_id == 1) {
            return view('Entreprise');
        } elseif (Auth::user()->role_id == 0) {
            return view('superAdmin');
        }
    });

    // Dashboard
    Route::get('/index', 'DashboardController@index')->name('dashbord');


//superAdmin
    Route::get('/superAdmin', 'SuperAdminController@index')->name('superAdmin.index');
    Route::get('/superAdmin/create', 'SuperAdminController@create')->name('superAdmin.create');
    Route::post('/superAdmin/store', 'SuperAdminController@store')->name('superAdmin.store');

    Route::get('/superAdminEdit/{user}/edit', 'SuperAdminController@edit')->name('superAdmin.edit');
    Route::patch('/superAdminupdate/{user}', 'SuperAdminController@update')->name('superAdmin.update');


// superAdmin Entreprise
    Route::get('/superAdmin/Entreprise', 'SuperAdmin\EntrepriseController@index')->name('superAdmin.Entreprise.index');
    Route::get('/superAdmin/Entreprise/create', 'SuperAdmin\EntrepriseController@create')->name('superAdmin.Entreprise.create');
    Route::post('/superAdmin/Entreprise/store', 'SuperAdmin\EntrepriseController@store')->name('superAdmin.Entreprise.store');
//****************
    Route::get('/superAdminEdit/{Entreprise}/edit', 'SuperAdmin\EntrepriseController@edit')->name('superAdmin.Entreprise.edit');
    Route::patch('/superAdminupdate/{Entreprise}', 'SuperAdmin\EntrepriseController@update')->name('superAdmin.Entreprise.update');
    Route::delete('/superAdmindestroy/{Entreprise}', 'SuperAdmin\EntrepriseController@destroy')->name('superAdmin.Entreprise.destroy');

//package
    Route::get('/superAdmin/Package', 'SuperAdmin\PackageController@index')->name('superAdmin.Package.index');

//Projet
    Route::get('/Entreprise/projet', 'Entreprise\ProjetController@index')->name('projet.index');
    Route::get('/Entreprise/projet/show', 'Entreprise\ProjetController@home')->name('projet.home');
    Route::get('/Entreprise/projet/create', 'Entreprise\ProjetController@create')->name('projet.create');
    Route::post('/Entreprise/projet/store', 'Entreprise\ProjetController@store')->name('projet.store');

    Route::delete('/Entreprise/projet/destroy/{projet}', 'Entreprise\ProjetController@destroy')->name('projet.destroy');

    //.store pour la création du  projet
    Route::post('/Entreprise/projet/categorie/store', 'Entreprise\ProjetController@afficher')->name('projet.afficher');
//Categorie
    /*    Route::get('/Entreprise/categorie', 'Entreprise\CategorieController@index')->name('categorie.index');

        Route::get('/Entreprise/categorie/create', 'Entreprise\CategorieController@create')->name('categorie.create');
        Route::post('/Entreprise/categorie/store', 'Entreprise\CategorieController@store')->name('categorie.store');

        Route::delete('/categoriedestroy/{categorie}', 'CategorieController@destroy')->name('categorie.destroy');*/

//Tâche

    Route::get('/Entreprise/tache', 'Entreprise\TacheController@index')->name('tache.index');
    Route::get('/Entreprise/tache/create', 'Entreprise\TacheController@create')->name('tache.create');
    Route::post('/Entreprise/tache/store', 'Entreprise\TacheController@store')->name('tache.store');
    Route::post('storeImages', 'Entreprise\TacheController@uploadImages')->name('tache.uploadImages');

    /*  Route::post('deleteImages', 'Entreprise\TacheController@deleteImage')->name('tache.deleteImage');*/


    //client
    Route::get('/Entreprise/client', 'Entreprise\ClientController@index')->name('client.index');
    Route::get('/Entreprise/client/create', 'Entreprise\ClientController@create')->name('client.create');
    Route::post('/Entreprise/client/store', 'Entreprise\ClientController@store')->name('client.store');
//Entreprise Employee

    Route::get('/Entreprise/Employee', 'Entreprise\EmployeeController@index')->name('Entreprise.Employee.index');
    Route::get('/Entreprise/Employee/create', 'Entreprise\EmployeeController@create')->name('Entreprise.Employee.create');
    Route::get('/Entreprise/Employee/show/{employee}', 'Entreprise\EmployeeController@show')->name('Entreprise.Employee.show');

    Route::post('/Entreprise/Employee/store', 'Entreprise\EmployeeController@store')->name('Entreprise.Employee.store');
    Route::get('/Entreprise/Employee/{employee}/edit', 'Entreprise\EmployeeController@edit')->name('Entreprise.Employee.edit');
    Route::patch('/Entreprise/Employee/{employee}', 'Entreprise\EmployeeController@update')->name('Entreprise.Employee.update');
    Route::delete('/Employeedestroy/{employee}', 'Entreprise\EmployeeController@destroy')->name('Entreprise.Employee.destroy');
//Employee
    Route::get('/employee/create', 'EmployeeController@create')->name('Employeer.create');
    Route::post('/employeestore', 'EmployeeController@store')->name('Entreprise.Employeer.store');
});
