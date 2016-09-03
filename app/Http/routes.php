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
    
Route::get('/transaction', function() {
    return view('/Employer/transaction');
});
Route::get('/employee', function() {
   // $employee = Employee::find($id);
    return view('/employee/show');
});


Route::get('/home', 'HomeController@index');    

Route::resource('/admin/comments', 'CommentsController');
Route::resource('/admin/promocode', 'PromocodeController');
Route::resource('/admin/settings', 'SettingsController');
Route::resource('/admin/user', 'UserController');
Route::resource('/offers', 'JobofferController');

Route::get('profile', function() {

    $user = Auth::user();
    return view('profile', compact('user'));

});

/**
 * @return TODO
 * 
 * - Custom Routes for Profiles 
 * - Modify 
 *
 */