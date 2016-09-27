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
//Admin
Route::resource('/admin/comments', 'CommentsController');
Route::resource('/admin/promocode', 'PromocodeController');
Route::resource('/admin/settings', 'SettingsController');
Route::resource('/admin/user', 'UserController');
Route::get('profile', 'UserController@profile');