<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalProfile\ProfileController;
use App\Http\Controllers\SprintBoardController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\SprintController;
use App\Http\Controllers\ProjectController;



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


// Auth::routes();
// Route::get('/todo', [TodoController::class, 'index']);

// Route::get('/projects', [ProjectController::class, 'index']);



Auth::routes();
Route::resource('sprints', SprintController::class);



//recourse is voor de standaard crud fucntions
Auth::routes();
Route::resource('todo', TodoController::class);



Auth::routes();
Route::resource('projects', ProjectController::class);








// Auth::routes();

// Route::get('/sprintboard', [SprintBoardController::class, 'index']);

Auth::routes();

Route::get('/profile', [App\Http\Controllers\PersonalProfile\ProfileController::class, 'boot'])->name('profile');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
