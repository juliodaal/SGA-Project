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

Route::get('/admin', function () {
    return view('admin.index');
});

Route::resource('/admin/discipline', 'disciplineController');

Route::resource('/admin/student', 'StudentController');

Route::post('/admin/student/findStudent', 'StudentController@findStudent')->name('student.findStudent');

Route::resource('/admin/professor', 'ProfessorController');

Route::post('/admin/professor/findProfessor', 'ProfessorController@findProfessor')->name('professor.findProfessor');

Route::resource('/admin/program', 'ProgramController');

Route::post('/admin/program/findProgram', 'ProgramController@findProgram')->name('program.findProgram');
