<?php

use Illuminate\Support\Facades\Route;



//controllers

use App\Http\Controllers\SprintBoardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SprintController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BacklogController;
use App\Http\Controllers\ProjectInfoController;


use App\Http\Controllers\Backlog_itemController;


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


Auth::routes();

Route::get('test3', function(){
	echo "test";
	echo Auth::user()->rights;
});




Route::resource('profile', ProfileController::class);

Route::resource('sprints', SprintController::class);

Route::resource('todo', TodoController::class);

Route::resource('projects', ProjectController::class);




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('projects/{project}/backlog_items', Backlog_itemController::class);

Route::get('/', function () {
    return view('welcome');
});