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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get("/",function(){
    return view("public.index");
});



Route::get('/test',function(){
    return "Hello World. !!!";
});

Auth::routes();

Route::get('/dashboard','Dashboard\DashBoardController@index')->name("dashboard");
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>['auth','cors']],function(){
    Route::get("students/report/{program?}/{department?}/{admission?}",'Student\StudentController@report');

    Route::resource('students','Student\StudentController');
    Route::get("students/{student}/create-2",'Student\StudentController@create_two');
    Route::post('students/student-store','Student\StudentController@storeStudent')->name("storeStudent");
    Route::get('students/search/{key}/{value}','Student\StudentController@searchStudent');
    Route::get('students/{program}/{department}/{admission?}','Student\StudentController@filterStudents'); //
    Route::resource('departments','Department\DepartmentController');
    Route::get('programs','Program\ProgramController@index');
    Route::get('programs/{program}/departments','Program\ProgramController@departments');
    Route::get('departments/{department}/{admission}/sections','Department\DepartmentController@sections');
    Route::get('admissions',function(){
        return App\Admission::all();
    });
    Route::resource('sections','Section\SectionController');

    Route::get("sections/{section}/students/count",'Section\SectionController@numberOfStudents');

    Route::resource('contacts','Contact\ContactPersonController')->except('create'); //we are excluding the create method because it depends on the students application id and we need to provide that info.
    Route::get("contacts/create/{application}",'Contact\ContactPersonController@create')->name("contacts.create");

    Route::post('profile/picture/upload/{id}','Profile\ProfileController@uploadPicture');
    Route::get('profile/picture/{id}','Profile\ProfileController@get');
    // Route::resource("pictures",'Profile\ProfileController');
});


