<?php

use App\Http\Controllers\grades\gradeController;
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
    return view('empty');
});
Route::group(['namespace' => 'Levels'], function () {
    Route::resource('Levels', 'levelController');
});

Route::group(['namespace' => 'Classes'], function () {
    Route::resource('Class', 'classController');
});

Route::group(['namespace' => 'Sections'], function () {
    Route::resource('Section', 'sectionController');
});

Route::group(['namespace' => 'Subjects'], function () {
    Route::resource('Subject', 'subjectController');
});

Route::group(['namespace' => 'Teachers'], function () {
    Route::resource('Teacher', 'teacherController');
});


Route::group(['namespace' => 'Students'], function () {
    Route::resource('Student', 'studentController');
});
