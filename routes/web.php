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
        Route::get('/projet', 'employee\ProjetController@index')->name('index');
    });
});

//client
//Employee login
Route::prefix('client')->group(function () {
    Route::get('/login', 'Auth\ClientController@showLoginForm')->name('client.login');
    Route::post('/login', 'Auth\ClientController@login')->name('client.login.submit');
    Route::post('logout/', 'Auth\ClientController@logout')->name('client.logout');

    Route::group(['middleware' => 'auth.client'], function () {
        Route::get('/dashborad', 'client\ClientController@index')->name('client.dashbord');
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
    Route::get('/superAdmin', 'SuperAdmin\SuperAdminController@index')->name('superAdmin.index');
    Route::get('/superAdmin/create', 'SuperAdmin\SuperAdminController@create')->name('superAdmin.create');
    Route::post('/superAdmin/store', 'SuperAdmin\SuperAdminController@store')->name('superAdmin.store');

    Route::get('/superAdminEdit/{user}/edit', 'SuperAdmin\SuperAdminController@edit')->name('superAdmin.edit');
    Route::patch('/superAdminupdate/{user}', 'SuperAdmin\SuperAdminController@update')->name('superAdmin.update');


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
//    Route::get('/Entreprise/projet', 'Entreprise\ProjetController@index')->name('Entreprise.categorie.index');
    Route::get('/Entreprise/projet/show', 'Entreprise\ProjetController@home')->name('projet.home');
    Route::get('/Entreprise/projet/create', 'Entreprise\ProjetController@create')->name('projet.create');
    Route::post('/Entreprise/projet/store', 'Entreprise\ProjetController@store')->name('projet.store');
    Route::get('/Entreprise/projet/{projet}/edit', 'Entreprise\ProjetController@edit')->name('projet.edit');
    Route::patch('/Entreprise/projet/{projet}', 'Entreprise\ProjetController@update')->name('projet.update');
    Route::delete('/Entreprise/projet/destroy/{projet}', 'Entreprise\ProjetController@destroy')->name('projet.destroy');
    Route::get('/Entreprise/projet/{projet}', 'Entreprise\ProjetController@show')->name('projet.show');


    Route::get('/membre', 'Entreprise\ProjetController@afficher_membre_projet')->name('afficher_membre_projet');
    Route::post('projet/membre', 'Entreprise\ProjetController@membre_projet')->name('membre.projet');




    Route::delete('/Entreprise/membre/destroy/{id_membre}', 'Entreprise\ProjetController@destroy_membre_projet')->name('destroy_membre');
/*    //.store pour la création du  projet
    Route::post('/Entreprise/projet/categorie/store', 'Entreprise\ProjetController@afficher')->name('projet.afficher');*/
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
    Route::get('/Entreprise/Tache/{tache}/edit', 'Entreprise\TacheController@edit')->name('tache.edit');
    Route::patch('/Entreprise/Tache/{tache}', 'Entreprise\TacheController@update')->name('tache.update');
    Route::delete('deleteTache/{tache}','Entreprise\TacheController@destroy')->name('tache.destroy');

//fullcalender
    Route::get('fullcalendar','FullCalendarController@index')->name('calander_index');
    Route::post('fullcalendar/create','FullCalendarController@create')->name('calander_create');
    Route::post('fullcalendar/update','FullCalendarController@update')->name('calander_update');
    Route::post('fullcalendar/delete','FullCalendarController@destroy')->name('calander_destroy');

    /*  Route::post('deleteImages', 'Entreprise\TacheController@deleteImage')->name('tache.deleteImage');*/


    //client
    Route::get('/Entreprise/client', 'Entreprise\ClientController@index')->name('Entreprise.client.index');
    Route::get('/Entreprise/client/create', 'Entreprise\ClientController@create')->name('Entreprise.client.create');
    Route::post('/Entreprise/client/store', 'Entreprise\ClientController@store')->name('Entreprise.client.store');

    Route::get('/Entreprise/client/show/{client}', 'Entreprise\ClientController@show')->name('Entreprise.client.show');
    Route::get('/Entreprise/client/{client}/edit', 'Entreprise\ClientController@edit')->name('Entreprise.client.edit');
    Route::patch('/Entreprise/client/{client}', 'Entreprise\ClientController@update')->name('Entreprise.client.update');
    Route::delete('/clientdestroy/{client}', 'Entreprise\ClientController@destroy')->name('Entreprise.client.destroy');


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

//department

Route::get('/Entreprise/Department', 'Entreprise\DepartmentController@index')->name('Entreprise.Department.index');
Route::get('/Entreprise/Department/create', 'Entreprise\DepartmentController@create')->name('Entreprise.Department.create');
Route::post('/Entreprise/Department/store', 'Entreprise\DepartmentController@store')->name('Entreprise.Department.store');
Route::get('/Entreprise/Department/{department}/edit', 'Entreprise\DepartmentController@edit')->name('Entreprise.Department.edit');
Route::patch('/Entreprise/update/{department}', 'Entreprise\DepartmentController@update')->name('Entreprise.Department.update');
Route::delete('/Entreprise/destroy/{department}', 'Entreprise\DepartmentController@destroy')->name('Entreprise.Department.destroy');
//Membre projet

Route::get('/Entreprise/Membre', 'Entreprise\MembreController@index')->name('Entreprise.Membre.index');
Route::get('/Entreprise/Membre/create', 'Entreprise\MembreController@create')->name('Entreprise.Membre.create');
Route::post('/Entreprise/Membre/store', 'Entreprise\MembreController@store')->name('Entreprise.Membre.store');
Route::delete('/Entreprise/Membre/{employee}', 'Entreprise\MembreController@destroy')->name('Entreprise.Membre.destroy');
Route::get('/Membre/{projet}', 'Entreprise\MembreController@afficher')->name('Entreprise.Membre.afficher');

//fullcalender
Route::get('/fullevent','FullEventController@index')->name('event.index');
Route::get('/fullevent/create','FullEventController@create')->name('event.create');
Route::post('/fullevent/update','FullEventController@update')->name('event.update');
Route::post('/fullevent/delete','FullEventController@destroy')->name('event.destroy');


Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/profile/update', 'ProfileController@updateProfile')->name('profile.update');
