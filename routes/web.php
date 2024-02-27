<?php
namespace App\Http\Controllers;

use \App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index']);


Route::middleware('auth')->controller(StudentController::class)->prefix('/students')->group(function(){
    // Request: GET localhost:8000/students
    // Response: List of students page
    Route::get('/', 'index')->name('students.list');

    // Request: GET localhost:8000/students/22
    // Response: Details page of student #22
    // Route::get('/{id}', 'show')->where('id','[0-9]+');
    // // Request GET localhost:8000/students/22/Ali (Ali is an optional parametar)
    // // Response: Details page of student #22 named Ali
    // Route::get('/{id}/{name?}', 'index')->where('id','[0-9]+');

    // Request: GET localhost:8000/students/create
    Route::get('/create', 'create')->name('students.create');
    // Request: POST localhost:8000/students
    Route::post('/','store');

    // Request: GET localhost:8000/students/33/edit
    // Respose: This is edit form of student #33
    Route::get('/{id}/edit', 'edit')->name('students.edit');
    // Request: PUT localhost:8000/student/33
    Route::put('/{id}', 'update')->name('students.update');
    // Request: DELETE localhost:8000/students/44
    Route::delete('/{id}', 'destroy')->name('students.delete');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
