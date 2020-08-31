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

// Landing Page
Route::get('/', function () { return view('welcome'); });

// Admins
Route::get('/admin', 'AdministratorController@index');
Route::resource('/admin/discipline', 'DisciplineController');
Route::resource('/admin/student', 'StudentController');
Route::post('/admin/student/findStudent', 'StudentController@findStudent')->name('student.findStudent');
Route::resource('/admin/professor', 'ProfessorController');
Route::post('/admin/professor/findProfessor', 'ProfessorController@findProfessor')->name('professor.findProfessor');
Route::resource('/admin/program', 'ProgramController');
Route::post('/admin/program/findProgram', 'ProgramController@findProgram')->name('program.findProgram');
Route::resource('/admin/administrator', 'AdministratorController');
Route::resource('/admin/career', 'CareerController');
Route::resource('/admin/plan', 'EducationalPlanController');
Route::post('/admin/plan/findPlan', 'EducationalPlanController@findPlan')->name('plan.findPlan');

// Mail
Route::get('/mail/password','EmailController@sendEmail')->name('mail.password.sendEmail');

// Generate Password
Route::get('/admin/generate/password', 'PasswordController@generatePassword')->name('password.generatePassword');

// Admin File Controllers
Route::get('/admin/file/discipline', 'FileAdminDataController@discipline');
Route::get('/admin/file/career', 'FileAdminDataController@career');
Route::get('/admin/file/student', 'FileAdminDataController@student');
Route::get('/admin/file/professor', 'FileAdminDataController@professor');
Route::get('/admin/file/program', 'FileAdminDataController@program');
Route::get('/admin/file/administrator', 'FileAdminDataController@administrator');
Route::get('/admin/file/educationalPlan', 'FileAdminDataController@educationalPlan');

// Auth
Auth::routes();

// Home
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/{career}/{discipline}/{group}', 'HomeController@estudentsGroup')->name('home.estudentsGroup');
Route::get('/home/{career}/{discipline}/{group}/{date}/{startTime}/{endTime}/date', 'HomeController@date')->name('home.date');
Route::get('/home/{student}/{date}/list/date', 'HomeController@dateList');
Route::resource('/home/inscriptions', 'InscriptionController');



