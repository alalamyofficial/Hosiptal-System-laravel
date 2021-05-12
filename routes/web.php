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

Route::get('/','MainController@main'); 

Route::match(['get', 'post'], '/botman', 'BotManController@handle');
Route::get('/botman/tinker', 'BotManController@tinker');

Route::get('/chatbot', function () {
    return view('chatbot');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//admin
Route::get('admin/login', 'AdminController@adminLogin')->name('admin.login');

//patient
//'middleware' => 'adminauth'
Route::group(['prefix' => 'admin'], function () {
    
    Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::post('dashboard', 'AdminController@Todashboard')->name('admin.Todashboard');

    //patient
    Route::get('create/patient','PatientController@create')->name('patient.create');
    Route::post('create/patient','PatientController@store')->name('patient.store');
    Route::get('show/patient','PatientController@index')->name('patient.show');

    //doctor
    Route::get('create/doctor','DoctorController@create')->name('doctor.create');
    Route::post('create/doctor','DoctorController@store')->name('doctor.store');
    Route::get('show/doctor','DoctorController@index')->name('doctor.show');
    
    
    //employees
    Route::get('create/employee','EmployeeController@create')->name('employee.create');
    Route::post('create/employee','EmployeeController@store')->name('employee.store');
    Route::get('show/employee','EmployeeController@index')->name('employee.show');
    
    //nurse
    Route::get('create/nurse','NurseController@create')->name('nurse.create');
    Route::post('create/nurse','NurseController@store')->name('nurse.store');
    Route::get('show/nurse','NurseController@index')->name('nurse.show');
    
    
    //users
    Route::get('users/list','UserController@index')->name('users.list');
    
    //departments
    Route::get('department/create','DepartmentController@create')->name('department.create');
    Route::post('department/store','DepartmentController@store')->name('department.store');
    Route::get('department/show','DepartmentController@index')->name('department.show');
    
    
    //services
    Route::get('service/create','ServiceController@create')->name('service.create');
    Route::post('service/store','ServiceController@store')->name('service.store');
    Route::get('service/show','ServiceController@index')->name('service.show');
    
    
    //settings
    Route::get('dashboard/settings','SettingsController@dashboardSettings')->name('dashboard.settings');
    Route::get('website/settings','SettingsController@websiteSettings')->name('website.settings');
    
    Route::post('dashboard/settings','SettingsController@editDashbaord')->name('editdashboard.store');
    Route::post('website/settings','SettingsController@editWebsite')->name('editWebsite.store');
    
    //appointment
    
    Route::get('appointment/create','AppointmentController@create')->name('appointment.create');
    Route::post('appointment/create','AppointmentController@store')->name('appointment.store');
    Route::get('appointment/show','AppointmentController@index')->name('appointment.show');
    
    Route::get('ambulance','AmbulanceController@show')->name('ambulance.show');
    
    //admin reservation
    Route::get('reservation','AdminController@reservation')->name('admin.reservation');
    
    //mails
    
    Route::get('mails','MailController@show')->name('admin.mails');
    Route::get('mails/content/{id}','MailController@content')->name('admin.mails.contents');

    //Payrolls
    Route::get('add/payroll','PayrollController@create')->name('payroll.create');
    Route::post('add/payroll','PayrollController@store')->name('payroll.store');
    Route::get('payrolls','PayrollController@index')->name('payroll.show');


    Route::get('visitors','VisitorController@my_visitors')->name('admin.visitor');

    Route::post('logout', 'AdminController@logout')->name('admin.logout');
});




Route::get('user/reservation','BookAppointmentController@index')->name('user.reservation')->middleware('auth');

//for users
Route::get('user/appointment','BookAppointmentController@create')->name('user.appointment')->middleware('auth');
Route::post('user/appointment','BookAppointmentController@store')->name('store.appointment')->middleware('auth');

//ambulance
Route::get('user/ambulance','AmbulanceController@create')->name('ambulance.create')->middleware('auth');
Route::post('user/ambulance','AmbulanceController@store')->name('ambulance.store')->middleware('auth');



//covid
Route::get('user/covid','BookAppointmentController@covid')->name('user.covid')->middleware('auth');

Route::get('user/doctors','BookAppointmentController@doctors')->name('user.doctors')->middleware('auth');


Route::get('user/day', function () {
    return view('day');
})->name('user.day');


//visitor
Route::get('contact/us','MailController@create')->name('contact.us');
Route::post('contact/us','MailController@store')->name('contact.sent');
Route::get('all/doctors','MainController@all_doctors')->name('all.doctors');


//user services
// Route::get('user/services','ServiceController@user_services')->name('user.services')->middleware('auth');

Route::get('about','MainController@about')->name('about');



Route::get('/geoip','TestController@test');