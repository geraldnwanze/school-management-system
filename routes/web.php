<?php

use Illuminate\Support\Facades\Route;

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

//website front end not authenticated users 
Route::get('/', 'HomepageController@index')->name('homePage');

//authenticated users
Route::group([
    // 'middleware' => 'auth', 
    'as' => 'dashboard.'], function () {
    Route::group(['prefix' => 'superadmin', 'as' => 'superadmin.'], function () {
        Route::get('/dashboard', 'Admin\DashboardController@superadmin')->name('dashboard');

        //students
        Route::get('/create-student', 'Student\RegistrationController@index')->name('createStudent');
        Route::post('/create-student', 'Student\RegistrationController@saveStudent');

        //staffs
        Route::get('/create-staff', 'Staff\RegistrationController@index')->name('createStaff');
        Route::post('/create-staff', 'Staff\RegistrationController@saveStaff');
    });

    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/dashboard', 'Admin\DashboardController@admin')->name('dashboard');
        
        //students
        Route::get('/create-student', 'Student\RegistrationController@index')->name('createStudent');
        Route::post('/create-student', 'Student\RegistrationController@saveStudent');

        //staffs
        Route::get('/create-staff', 'Staff\RegistrationController@index')->name('createStaff');
        Route::post('/create-staff', 'Staff\RegistrationController@saveStaff');
        Route::get('/assign-staff-to-class', 'Staff\AssignStaffController@index')->name('assignStaff');
        Route::post('/assign-staff-to-class', 'Staff\AssignStaffController@saveStaffAssignment');
        Route::get('/assign-subject-to-staff', 'Staff\AssignStaffController@assignSubject')->name('assignSubject');
        Route::post('/assign-subject-to-staff', 'Staff\AssignStaffController@saveAssignSubject');
        Route::get('/create-classes', 'Student\ClassesController@createClass')->name('createClass');
        Route::get('/create-subjects', 'Student\SubjectsController@createSubject')->name('createSubject');
        
    });

    Route::group(['prefix' => 'students', 'as' => 'students.'], function () {
        Route::get('/dashbord', 'Student\DashboardController@index');
        Route::get('/check-result', 'Student\ResultController@checkResult');
    });

    Route::group(['prefix' => 'staff', 'as' => 'staffs.'], function () {
        Route::get('/dashbord', 'Staff\DashboardController@index');
    });

});