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
Route::get('admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
Route::post('admin/dashboard', 'AdminController@Todashboard')->name('admin.Todashboard');

//patient
Route::get('admin/create/patient','PatientController@create')->name('patient.create');
Route::post('admin/create/patient','PatientController@store')->name('patient.store');
Route::get('admin/show/patient','PatientController@index')->name('patient.show');


//doctor
Route::get('admin/create/doctor','DoctorController@create')->name('doctor.create');
Route::post('admin/create/doctor','DoctorController@store')->name('doctor.store');
Route::get('admin/show/doctor','DoctorController@index')->name('doctor.show');


//nurse
Route::get('admin/create/nurse','NurseController@create')->name('nurse.create');
Route::post('admin/create/nurse','NurseController@store')->name('nurse.store');
Route::get('admin/show/nurse','NurseController@index')->name('nurse.show');


//users
Route::get('admin/users/list','UserController@index')->name('users.list');

//departments
Route::get('admin/department/create','DepartmentController@create')->name('department.create');
Route::post('admin/department/store','DepartmentController@store')->name('department.store');
Route::get('admin/department/show','DepartmentController@index')->name('department.show');


//services
Route::get('admin/service/create','serviceController@create')->name('service.create');
Route::post('admin/service/store','serviceController@store')->name('service.store');
Route::get('admin/service/show','serviceController@index')->name('service.show');

Route::get('user/services','ServiceController@user_services')->name('user.services')->middleware('auth');

//settings
Route::get('admin/dashboard/settings','SettingsController@dashboardSettings')->name('dashboard.settings');
Route::get('admin/website/settings','SettingsController@websiteSettings')->name('website.settings');

Route::post('admin/dashboard/settings','SettingsController@editDashbaord')->name('editdashboard.store');
Route::post('admin/website/settings','SettingsController@editWebsite')->name('editWebsite.store');

//appointment

Route::get('admin/appointment/create','AppointmentController@create')->name('appointment.create');
Route::post('admin/appointment/create','AppointmentController@store')->name('appointment.store');
Route::get('admin/appointment/show','AppointmentController@index')->name('appointment.show');

Route::get('user/reservation','BookAppointmentController@index')->name('user.reservation')->middleware('auth');

//for users
Route::get('user/appointment','BookAppointmentController@create')->name('user.appointment')->middleware('auth');
Route::post('user/appointment','BookAppointmentController@store')->name('store.appointment')->middleware('auth');

//ambulance
Route::get('user/ambulance','AmbulanceController@create')->name('ambulance.create')->middleware('auth');
Route::post('user/ambulance','AmbulanceController@store')->name('ambulance.store')->middleware('auth');

Route::get('admin/ambulance','AmbulanceController@show')->name('ambulance.show');


//covid
Route::get('user/covid','BookAppointmentController@covid')->name('user.covid')->middleware('auth');

Route::get('user/doctors','BookAppointmentController@doctors')->name('user.doctors')->middleware('auth');

//admin reservation
Route::get('admin/reservation','AdminController@reservation')->name('admin.reservation');

Route::get('user/day', function () {
    return view('day');
})->name('user.day');


//visitor
Route::get('contact/us','MailController@create')->name('contact.us');
Route::post('contact/us','MailController@store')->name('contact.sent');
Route::get('all/doctors','MainController@all_doctors')->name('all.doctors');

//mails

Route::get('mails','MailController@show')->name('admin.mails');
Route::get('mails/content/{id}','MailController@content')->name('admin.mails.contents');


Route::get('user/services','serviceController@user_services')->name('user.services');