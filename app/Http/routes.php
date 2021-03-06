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
    if (Auth::check())
        return redirect('/home');
    return view('welcome');
});

Route::auth();
Route::get('archivedE', 'EmployeeJobOfferController@indexAccepted');
Route::get('archived', 'JobofferController@archived_index');
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
Route::resource('/offers', 'EmployeeJobOfferController');
Route::resource('/search', 'ProfileController@search');
Route::resource('/search_staff', 'ProfileController@search_staff');

//Employer
Route::resource('/reviews', 'EmployerCommentsController');
Route::get('/reviews/create/{id}', 'EmployerCommentsController@create');
Route::get('/reviews/custom/create/{id}', 'EmployerCommentsController@customCreate');
Route::post('reviews/custom/', 'EmployerCommentsController@customStore');
Route::resource('/jobs', 'JobofferController');
Route::resource('/invite', 'InvitesController');
Route::get('/invite/accept/{id}', 'InvitesController@accept');
Route::get('/invite/decline/{id}', 'InvitesController@decline');

//Admin
Route::get('/admin/comments/approved', 'CommentsController@approved');
Route::resource('/admin/comments', 'CommentsController');
Route::resource('/admin/promocode', 'PromoCodeController');
Route::resource('/admin/settings', 'SettingsController');
Route::resource('/staff', 'ProfileController');
Route::resource('/admin/user', 'AdminUserController');
Route::post('/admin/user/search', 'AdminUserController@searchByEmail');


//Profile
Route::get('profile', 'UserController@profile');
Route::get('profile/delete', 'UserController@delete');
Route::get('profile/destroy/{id}', 'UserController@destroy');
Route::get('profile/subscription', 'UserController@subscription');
Route::get('profile/experience', 'UserController@experience');
Route::get('profile/skills', 'UserController@skills');
Route::get('profile/security', 'UserController@security');
Route::get('profile/availability', 'UserController@availability');

Route::post('avl', 'AvailabilityController@store');

//Creating Accounts
Route::get('register/employee', 'CreateAccController@EmployeeRegisterForm');
Route::post('register/employee', 'CreateAccController@CreateEmployee');
Route::get('register/employer', 'CreateAccController@EmployerRegisterForm');
Route::post('register/employer', 'CreateAccController@CreateEmployer');

Route::post('updatepass', 'UserController@updatepassword');
Route::post('subscribe', 'EmployerController@subscribe');
Route::post('subscribe/yearly', 'EmployerController@SubscribeYearly');
Route::post('/subscribe/updatecard', 'EmployerController@UpdateCard');
Route::get('subscription/cancel', 'EmployerController@cancel');
Route::get('subscription/swap', 'EmployerController@swap');
Route::get('subscription/resume', 'EmployerController@resume');

Route::post('profile/update/employee', 'UserController@UpdateEmployee');
Route::post('profile/update/employer', 'UserController@UpdateEmployer');

Route::get('comments/approve/{id}', 'CommentsController@approve');
Route::get('comments/disapprove/{id}', 'CommentsController@disapprove');
Route::get('ban/{id}', 'BannedAccountsController@ban');
Route::get('unban/{id}', 'BannedAccountsController@unban');

Route::get('user/invoice/{invoice}', 'EmployerController@invoice');

//Job Offer Response

Route::get('/offers/acceptJobOffer/{id}', 'EmployeeJobOfferController@acceptJobOffer');


//Partially Tseting Routes
Route::get('images/{filename}', [
    'uses' => 'ImageController@readImage',
    'as' => 'image'
]);

Route::post('/img/store', 'ImageController@store');

//E-mail Routes
Route::resource('/email', 'EmailsController');
Route::get('/email/renewSub/{id}', 'EmailsController@renewSub');
Route::get('/email/signUp/{id}', 'EmailsController@signUp');
Route::get('/email/acceptJob/{id}', 'EmailsController@acceptJob');
Route::get('/email/sendJobRequest/{id}', 'EmailsController@sendJobRequest');
Route::get('/email/dispute/{id}/{cid}', 'EmailsController@dispute');

Route::post(
    'stripe/webhook',
    '\Laravel\Cashier\Http\Controllers\WebhookController@handleWebhook'
);

Route::get('verify/set/{id}', 'VerificationController@store');

Route::get('verify/{hash}', 'VerificationController@destroy');
