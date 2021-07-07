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

Route::get('/', 'MainController@main');

Route::match(['get', 'post'], '/botman', 'BotManController@handle');
Route::get('/botman/tinker', 'BotManController@tinker');

Route::get('/chatbot', function () {
    return view('chatbot');
});

//auth
Auth::routes();
Route::get('/edit', 'HomeController@editProfile')->name('editProfile');
Route::post('/edit', 'HomeController@updateProfile')->name('updateProfile');


Route::get('/home', 'HomeController@index')->name('home');

//admin
Route::get('admin/login', 'AdminController@adminLogin')->name('admin.login');

//'middleware' => 'adminauth'
Route::group(['prefix' => 'admin'], function () {

    Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::post('dashboard', 'AdminController@Todashboard')->name('admin.Todashboard');

    //patient
    Route::get('patient/create', 'PatientController@create')->name('patient.create');
    Route::post('patient/create', 'PatientController@store')->name('patient.store');
    Route::get('patient/show', 'PatientController@index')->name('patient.show');
    Route::get('patient/edit/{id}', 'PatientController@edit')->name('patient.edit');
    Route::patch('patient/update/{id}', 'PatientController@update')->name('patient.update');
    Route::delete('patient/destroy/{id}', 'PatientController@destroy')->name('patient.delete');


    //doctor
    Route::get('doctor/create', 'DoctorController@create')->name('doctor.create');
    Route::post('doctor/store', 'DoctorController@store')->name('doctor.store');
    Route::get('doctor/show', 'DoctorController@index')->name('doctor.show');
    Route::get('doctor/edit/{id}', 'DoctorController@edit')->name('doctor.edit');
    Route::patch('doctor/update/{id}', 'DoctorController@update')->name('doctor.update');
    Route::delete('doctor/destroy/{id}', 'DoctorController@destroy')->name('doctor.delete');

    //Schedule
    Route::get('doctor/schedule/create', 'DoctorScheduleController@create')->name('schedule.create');
    Route::post('doctor/schedule/store', 'DoctorScheduleController@store')->name('schedule.store');
    Route::get('doctor/schedule/show', 'DoctorScheduleController@index')->name('schedule.show');
    Route::get('doctor/schedule/edit/{id}', 'DoctorScheduleController@edit')->name('schedule.edit');
    Route::post('doctor/schedule/update/{id}', 'DoctorScheduleController@update')->name('schedule.update');
    Route::delete('doctor/schedule/destroy/{id}', 'DoctorScheduleController@destroy')->name('schedule.delete');

    //employees
    Route::get('employee/create', 'EmployeeController@create')->name('employee.create');
    Route::post('employee/create', 'EmployeeController@store')->name('employee.store');
    Route::get('employee/show', 'EmployeeController@index')->name('employee.show');
    Route::get('employee/edit/{id}', 'EmployeeController@edit')->name('employee.edit');
    Route::patch('employee/update/{id}', 'EmployeeController@update')->name('employee.update');
    Route::delete('employee/destroy/{id}', 'EmployeeController@destroy')->name('employee.delete');

    //nurse
    Route::get('nurse/create', 'NurseController@create')->name('nurse.create');
    Route::post('nurse/create', 'NurseController@store')->name('nurse.store');
    Route::get('nurse/show', 'NurseController@index')->name('nurse.show');
    Route::get('nurse/edit/{id}', 'NurseController@edit')->name('nurse.edit');
    Route::patch('nurse/update/{id}', 'NurseController@update')->name('nurse.update');
    Route::delete('nurse/destroy/{id}', 'NurseController@destroy')->name('nurse.delete');

    //users
    Route::get('users/list', 'UserController@index')->name('users.list');

    //departments
    Route::get('department/create', 'DepartmentController@create')->name('department.create');
    Route::post('department/store', 'DepartmentController@store')->name('department.store');
    Route::get('department/show', 'DepartmentController@index')->name('department.show');
    Route::get('department/edit/{id}', 'DepartmentController@edit')->name('department.edit');
    Route::patch('department/update/{id}', 'DepartmentController@update')->name('department.update');
    Route::delete('department/destroy/{id}', 'DepartmentController@destroy')->name('department.delete');

    //operations
    Route::get('operation/create', 'OperationController@create')->name('operation.create');
    Route::post('operation/store', 'OperationController@store')->name('operation.store');
    Route::get('operation/show', 'OperationController@index')->name('operation.show');
    Route::get('operation/edit/{id}', 'OperationController@edit')->name('operation.edit');
    Route::patch('operation/update/{id}', 'OperationController@update')->name('operation.update');
    Route::delete('operation/destroy/{id}', 'OperationController@destroy')->name('operation.delete');


    //services
    Route::get('service/create', 'ServiceController@create')->name('service.create');
    Route::post('service/store', 'ServiceController@store')->name('service.store');
    Route::get('service/show', 'ServiceController@index')->name('service.show');
    Route::get('service/edit/{id}', 'ServiceController@edit')->name('service.edit');
    Route::post('service/update/{id}', 'ServiceController@update')->name('service.update');
    Route::delete('service/destroy/{id}', 'ServiceController@destroy')->name('service.delete');

    //settings
    Route::get('dashboard/settings', 'SettingsController@dashboardSettings')->name('dashboard.settings');
    Route::get('website/settings', 'SettingsController@websiteSettings')->name('website.settings');

    Route::post('dashboard/settings', 'SettingsController@editDashbaord')->name('editdashboard.store');
    Route::post('website/settings', 'SettingsController@editWebsite')->name('editWebsite.store');

    //appointment

    Route::get('appointment/create', 'AppointmentController@create')->name('appointment.create');
    Route::post('appointment/create', 'AppointmentController@store')->name('appointment.store');
    Route::get('appointment/show', 'AppointmentController@index')->name('appointment.show');
    Route::get('appointment/edit/{id}', 'AppointmentController@edit')->name('appointment.edit');
    Route::post('appointment/update/{id}', 'AppointmentController@update')->name('appointment.update');
    Route::delete('appointment/destroy/{id}', 'AppointmentController@destroy')->name('appointment.delete');

    //ambulance
    Route::get('ambulance', 'AmbulanceController@show')->name('ambulance.show');
    // Route::post('ambulance','AmbulanceController@destroy')->name('ambulance.destroy');
    // Route::get('ambulance/orders','AmbulanceController@orders')->name('ambulance.orders');
    // Route::get('ambulance/orders/delete/{id}','AmbulanceController@destroy')->name('ambulance.delete');

    //vaccine
    Route::get('vaccines', 'VaccineController@show')->name('vaccine.show');
    Route::get('pending/vaccines', 'VaccineController@pending_vaccines')->name('vaccine.pending');
    Route::get('pending/vaccines/{id}', 'VaccineController@approve_vaccine_request')->name('vaccine.approve');

    //bed
    Route::get('beds', 'BedController@show')->name('bed.show');
    Route::get('pending/beds', 'BedController@pending_beds')->name('bed.pending');
    Route::get('pending/beds/{id}', 'BedController@approve_beds_request')->name('bed.approve');

    //Drugs
    Route::get('drug/create', 'DrugController@create')->name('drug.create');
    Route::post('drug/store', 'DrugController@store')->name('drug.store');
    Route::get('drug/show', 'DrugController@index')->name('drug.show');
    Route::get('drug/edit/{id}', 'DrugController@edit')->name('drug.edit');
    Route::patch('drug/update/{id}', 'DrugController@update')->name('drug.update');
    Route::delete('drug/destroy/{id}', 'DrugController@destroy')->name('drug.delete');


    //admin reservation
    Route::get('reservations', 'AdminController@reservation')->name('admin.reservation');
    Route::get('pending/reservations', 'AdminController@pending_reservation')->name('admin.reservation.pending');
    Route::get('/reservation/{id}', 'AdminController@approve_reservations')->name('admin.approve');

    //mails

    Route::get('mails', 'MailController@show')->name('admin.mails');
    Route::get('mails/content/{id}', 'MailController@content')->name('admin.mails.contents');
    Route::get('send/mail', 'MailController@contact_form')->name('admin.contact');
    Route::post('send/mail', 'MailController@send_mails')->name('admin.send');



    //Payrolls
    Route::get('add/payroll', 'PayrollController@create')->name('payroll.create');
    Route::post('add/payroll', 'PayrollController@store')->name('payroll.store');
    Route::get('payrolls', 'PayrollController@index')->name('payroll.show');
    Route::get('payroll/edit/{id}', 'PayrollController@edit')->name('payroll.edit');
    Route::post('payroll/update/{id}', 'PayrollController@update')->name('payroll.update');
    Route::patch('payroll/destroy/{id}', 'PayrollController@destroy')->name('payroll.delete');

    //blog
    Route::get('blog/create', 'BlogController@create')->name('blog.create');
    Route::post('blog/store', 'BlogController@store')->name('blog.store');
    Route::get('blog/show', 'BlogController@index')->name('blog.show');
    Route::get('blog/edit/{id}', 'BlogController@edit')->name('blog.edit');
    Route::patch('blog/update/{id}', 'BlogController@update')->name('blog.update');
    Route::delete('blog/destroy/{id}', 'BlogController@destroy')->name('blog.delete');
    Route::get('blog/show/{id}', 'BlogController@single_blog')->name('blog.single');

    //report

    Route::get('report/create', 'ReportController@create')->name('report.create');
    Route::post('report/store', 'ReportController@store')->name('report.store');
    Route::get('report/show', 'ReportController@index')->name('report.show');
    Route::get('report/edit/{id}', 'ReportController@edit')->name('report.edit');
    Route::patch('report/update/{id}', 'ReportController@update')->name('report.update');
    Route::delete('report/destroy/{id}', 'ReportController@destroy')->name('report.delete');
    Route::get('report/show/{id}', 'ReportController@single_report')->name('report.single');



    //who visit me
    Route::get('visitors', 'VisitorController@my_visitors')->name('admin.visitor');

    //admin logout
    Route::post('logout', 'AdminController@logout')->name('admin.logout');
});




Route::get('user/reservation', 'BookAppointmentController@index')->name('user.reservation')->middleware('auth');

//for users
Route::get('user/appointment', 'BookAppointmentController@create')->name('user.appointment')->middleware('auth');
Route::post('user/appointment', 'BookAppointmentController@store')->name('store.appointment')->middleware('auth');
Route::get('user/appointment/delete/{id}', 'BookAppointmentController@destroy')->name('appointment.delete')->middleware('auth');


//ambulance
Route::get('user/ambulance/request', 'AmbulanceController@create')->name('ambulance.create')->middleware('auth');
Route::post('user/ambulance/request', 'AmbulanceController@store')->name('ambulance.store')->middleware('auth');
Route::get('ambulance/orders', 'AmbulanceController@orders')->name('ambulance.orders');
Route::get('user/ambulance/destroy/{id}', 'AmbulanceController@destroy')->name('ambulance.destroy')->middleware('auth');

//vaccine

Route::get('user/vaccine/request', 'VaccineController@create')->name('user.vaccine.request')->middleware('auth');
Route::get('user/vaccine/orders', 'VaccineController@orders')->name('user.vaccine.orders')->middleware('auth');
Route::post('user/vaccine/request', 'VaccineController@store')->name('user.vaccine.store')->middleware('auth');
Route::get('user/vaccine/destroy/{id}', 'VaccineController@destroy')->name('vaccine.destroy')->middleware('auth');

//bed

Route::get('user/bed/request', 'BedController@create')->name('user.bed.request')->middleware('auth');
Route::get('user/bed/orders', 'BedController@orders')->name('user.bed.orders')->middleware('auth');
Route::post('user/bed/request', 'BedController@store')->name('user.bed.store')->middleware('auth');
Route::get('user/bed/destroy/{id}', 'BedController@destroy')->name('bed.destroy')->middleware('auth');


//covid
Route::get('user/covid', 'BookAppointmentController@covid')->name('user.covid')->middleware('auth');

Route::get('user/day', function () {
    return view('user.day');
})->name('user.day');


//visitor
Route::get('contact/us', 'MailController@create')->name('contact.us');
Route::post('contact/us', 'MailController@store')->name('contact.sent');
Route::get('all/doctors', 'MainController@all_doctors')->name('all.doctors');
Route::get('doctors/{id}', 'MainController@single_doctor')->name('single.doctor');
Route::get('all/services', 'MainController@all_services')->name('all.services');
Route::get('all/drugs', 'MainController@all_drugs')->name('all.drugs');
Route::get('drug/{id}', 'MainController@single_drug')->name('single.drug');


//user services
// Route::get('user/services','ServiceController@user_services')->name('user.services')->middleware('auth');

Route::get('about', 'MainController@about')->name('about');



Route::get('/geoip', 'TestController@test');

//main blog
Route::get('blog', 'MainController@publicBlog')->name('blog');
Route::get('blog/{id}', 'MainController@singleBlog')->name('blog.post');
