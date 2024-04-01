<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
                    //frontend
Route::get('/','HomeController@index' );
// Route::get('/logout','AdminController@log_out');

Route::get('/trang-chu','HomeController@index');

Route::get('/logout-home','HomeController@log_out');
Route::get('/detail/{topic_id}','HomeController@detail');
Route::get('/topic','HomeController@topic');
Route::get('/edit-info/{user_id}','HomeController@edit_info');


Route::post('/update-info/{user_id}','HomeController@update_info');
Route::post('/home-dashboard','HomeController@home_dashboard')->name('checkLogin');
Route::post('/tim-kiem','HomeController@search');
                    //backend
// Accountadmin
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::get('/logout','AdminController@log_out');


Route::post('/admin-dashboard','AdminController@dashboard');

//Banner
Route::get('/manage-banner','SlideController@manage_banner');
Route::get('/add-slider','SlideController@add_slider');
Route::get('/unactive-slider/{slider_id}','SlideController@unactive_slider');
Route::get('/active-slider/{slider_id}','SlideController@active_slider');

Route::post('/insert-slider','SlideController@insert_slider');


// FacultyList
Route::get('/add-faculty','FacultyList@add_faculty');
Route::get('/edit-faculty/{khoa_id}','FacultyList@edit_faculty');
Route::get('/delete-faculty/{khoa_id}','FacultyList@delete_faculty');
Route::get('/all-faculty','FacultyList@all_faculty');

Route::post('/save-faculty','FacultyList@save_faculty');
Route::post('/update-faculty/{khoa_id}','FacultyList@update_faculty');


//Majors
Route::get('/add-major','MajorsController@add_major');
Route::get('/edit-major/{nganh_id}','MajorsController@edit_major');
Route::get('/delete-major/{nganh_id}','MajorsController@delete_major');
Route::get('/all-major','MajorsController@all_major');

Route::post('/save-major','MajorsController@save_major');
Route::post('/update-major/{nganh_id}','MajorsController@update_major');


// student
Route::get('/add-student','studentController@add_student');
Route::get('/edit-student/{student_id}','studentController@edit_student');
Route::get('/delete-student/{student_id}','studentController@delete_student');
Route::get('/all-student','studentController@all_student');

Route::post('/save-student','studentController@save_student');
Route::post('/update-student/{student_id}','studentController@update_student');


// teacher
Route::get('/add-teacher','TeacherController@add_teacher');
Route::get('/edit-teacher/{teacher_id}','TeacherController@edit_teacher');
Route::get('/delete-teacher/{teacher_id}','TeacherController@delete_teacher');
Route::get('/all-teacher','TeacherController@all_teacher');


Route::post('/save-teacher','TeacherController@save_teacher');
Route::post('/update-teacher/{teacher_id}','TeacherController@update_teacher');

// Accountadmin
Route::get('/add-account','AccountController@add_account');
Route::get('/edit-account/{user_id}','AccountController@edit_account');
Route::get('/delete-account/{user_id}','AccountController@delete_account');
Route::get('/all-account','AccountController@all_account');


Route::post('/save-account','AccountController@save_account');
Route::post('/update-account/{user_id}','AccountController@update_account');

// Topic //comment
Route::get('/all-topic','TopicController@all_topic');
Route::get('/detail-topic/{topic_id}','TopicController@detail_topic');
Route::post('/load-comment','TopicController@load_comment');
Route::post('/send-comment','TopicController@send_comment');

Route::get('/all-comment','TopicController@all_comment');