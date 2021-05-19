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
    Route::get('patient/create','PatientController@create')->name('patient.create');
    Route::post('patient/create','PatientController@store')->name('patient.store');
    Route::get('patient/show','PatientController@index')->name('patient.show');
    Route::get('patient/edit/{id}','PatientController@edit')->name('patient.edit');
    Route::patch('patient/update/{id}','PatientController@update')->name('patient.update');

    
    //doctor
    Route::get('doctor/create','DoctorController@create')->name('doctor.create');
    Route::post('doctor/store','DoctorController@store')->name('doctor.store');
    Route::get('doctor/show','DoctorController@index')->name('doctor.show');
    Route::get('doctor/edit/{id}','DoctorController@edit')->name('doctor.edit');
    Route::patch('doctor/update/{id}','DoctorController@update')->name('doctor.update');
    
    //Schedule
    Route::get('doctor/schedule/create','DoctorScheduleController@create')->name('schedule.create');
    Route::post('doctor/schedule/store','DoctorScheduleController@store')->name('schedule.store');
    Route::get('doctor/schedule/show','DoctorScheduleController@index')->name('schedule.show');
    Route::get('doctor/schedule/edit/{id}','DoctorScheduleController@edit')->name('schedule.edit');
    Route::patch('doctor/schedule/update/{id}','DoctorScheduleController@update')->name('schedule.update');

    //employees
    Route::get('employee/create','EmployeeController@create')->name('employee.create');
    Route::post('employee/create','EmployeeController@store')->name('employee.store');
    Route::get('employee/show','EmployeeController@index')->name('employee.show');
    Route::get('employee/edit/{id}','EmployeeController@edit')->name('employee.edit');
    Route::patch('employee/update/{id}','EmployeeController@update')->name('employee.update');

    //nurse
    Route::get('nurse/create','NurseController@create')->name('nurse.create');
    Route::post('nurse/create','NurseController@store')->name('nurse.store');
    Route::get('nurse/show','NurseController@index')->name('nurse.show');
    Route::get('nurse/edit/{id}','NurseController@edit')->name('nurse.edit');
    Route::patch('nurse/update/{id}','NurseController@update')->name('nurse.update');
    
    //users
    Route::get('users/list','UserController@index')->name('users.list');
    
    //departments
    Route::get('department/create','DepartmentController@create')->name('department.create');
    Route::post('department/store','DepartmentController@store')->name('department.store');
    Route::get('department/show','DepartmentController@index')->name('department.show');
    Route::get('department/edit/{id}','DepartmentController@edit')->name('department.edit');
    Route::patch('department/update/{id}','DepartmentController@update')->name('department.update');

    //operations
    Route::get('operation/create','OperationController@create')->name('operation.create');
    Route::post('operation/store','OperationController@store')->name('operation.store');
    Route::get('operation/show','OperationController@index')->name('operation.show');
    Route::get('operation/edit/{id}','OperationController@edit')->name('operation.edit');
    Route::patch('operation/update/{id}','OperationController@update')->name('operation.update');

    
    //services
    Route::get('service/create','ServiceController@create')->name('service.create');
    Route::post('service/store','ServiceController@store')->name('service.store');
    Route::get('service/show','ServiceController@index')->name('service.show');
    Route::get('service/edit/{id}','ServiceController@edit')->name('service.edit');
    Route::post('service/update/{id}','ServiceController@update')->name('service.update');
    
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


    //blog
    Route::get('blog/create','BlogController@create')->name('blog.create');
    Route::post('blog/store','BlogController@store')->name('blog.store');
    Route::get('blog/show','BlogController@index')->name('blog.show');
    Route::get('blog/edit/{id}','BlogController@edit')->name('blog.edit');
    Route::post('blog/update/{id}','BlogController@update')->name('blog.update');

    //who visit me
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
Route::get('all/services','MainController@all_services')->name('all.services');


//user services
// Route::get('user/services','ServiceController@user_services')->name('user.services')->middleware('auth');

Route::get('about','MainController@about')->name('about');



Route::get('/geoip','TestController@test');

//main blog
Route::get('blog','MainController@publicBlog')->name('blog');
// Route::get('blog','BlogController@publicBlog')->name('blog');
