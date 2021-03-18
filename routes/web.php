<?php

use Illuminate\Support\Facades\Route;



//controllers

use App\Http\Controllers\SprintBoardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SprintController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Backlog_itemController;
use App\Http\Controllers\ProjectInfoController;
use App\Http\Controllers\taskController;
use App\Http\Controllers\teamUserController;
use App\Http\Controllers\RetrospectiveController;





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


// je moet auth zijn dus ingelogd zijn anders word je naar inlog gestuurd
Route::middleware('auth')->group(function () {

    Route::resource('profile', ProfileController::class);

    //projecten
    Route::get('/projects/', [App\Http\Controllers\ProjectController::class, 'index']);
    Route::get('/projects/create', [App\Http\Controllers\ProjectController::class, 'create']);
    Route::get('/projects/{project}', [App\Http\Controllers\ProjectController::class, 'show']);

    Route::get('/projects/{project}/teamember', [App\Http\Controllers\teamUserController::class, 'index'])->name('teamember');

    Route::get('/projects/{project}/teamember/create', [App\Http\Controllers\teamUserController::class, 'create'])->name('teamember_create');

    Route::get('/projects/{project}/sprints', [App\Http\Controllers\SprintController::class, 'index'])->name('sprints');

    Route::get('/projects/{project}/sprints/create', [App\Http\Controllers\SprintController::class, 'create'])->name('create_sprints');
    
    Route::get('/projects/{project}/retrospectives', [App\Http\Controllers\RetrospectiveController::class, 'index'])->name('retrospectives');

     Route::post('/projects/{project}/retrospectives/create', [App\Http\Controllers\RetrospectiveController::class, 'index'])->name('retrospectives');

    Route::get('/projects/{project}/retrospectives/create', [App\Http\Controllers\RetrospectiveController::class, 'create'])->name('create_retrospectives');

    Route::resource('backlog', Backlog_itemController::class);

    Route::resource('Sprintguest', SprintguestController::class);

    Route::post('/taskInsertUser', [App\Http\Controllers\taskController::class, 'insertUser'])->name('taskInsertUser');

    Route::post('/insertTaskToSprint', [App\Http\Controllers\taskController::class, 'insertTaskToSprint'])->name('insertTaskToSprint');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //Retrospective

    // Route::resource('retrospective', RetrospectiveController::class);
});
    

Route::get('/', function () {
    return view('welcome');
});
