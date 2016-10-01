<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::auth();


 /*  Routes to be removed after testing: */
Route::get('/jobs', function () {
    return view('/joboffers/index');
});  

Route::get('/transaction', function() {
    return view('/Employer/transaction');
});
Route::get('/employee', function() {
   // $employee = Employee::find($id);
    return view('/employee/show');
});
Route::get('/employee/create', function() {
   // $employee = Employee::find($id);
    return view('/employee/create');
});


Route::get('/home', 'HomeController@index');


//Employee
Route::resource('/my-reviews', 'EmployeeCommentsController');
Route::resource('/skills', 'SkillsController');
Route::resource('/experience', 'ExperienceController');
Route::resource('/offers', 'EmployeeJobofferController');

//Employer
Route::resource('/reviews', 'EmployerCommentsController');
Route::resource('/jobs', 'JobofferController');
Route::resource('/invite', 'InvitesController');

//Admin
Route::resource('/admin/comments', 'CommentsController');
Route::resource('/admin/promocode', 'PromocodeController');
Route::resource('/admin/settings', 'SettingsController');
Route::resource('/admin/user', 'ProfileController');
Route::resource('/email', 'EmailsController');

//Profile
Route::get('profile', 'UserController@profile');
Route::get('profile/subscription', 'UserController@subscription');
Route::get('profile/experience', 'UserController@experience');
Route::get('profile/skills', 'UserController@skills');
Route::get('profile/security', 'UserController@security');


//Creating Accounts
Route::get('register/employee', 'CreateAccController@EmployeeRegisterForm');
Route::post('register/employee', 'CreateAccController@CreateEmployee');
Route::get('register/employer', 'CreateAccController@EmployerRegisterForm');
Route::post('register/employer', 'CreateAccController@CreateEmployer');