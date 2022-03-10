<?php

    use App\Http\Controllers\ProjectsController;
    use App\Http\Controllers\ProjectTasksController;
    use App\Http\Controllers\TasksController;
    use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

    Route::get('/sample', function () {
        return Inertia::render('Sample');
    });


    Route::group(['middleware' => 'auth:sanctum', 'verified'], function(){

        Route::get('/dashboard', [ProjectsController::class, 'index'])->name('dashboard');
        Route::post('/tasks', [TasksController::class, 'store'])->name('tasks.store');
        Route::post('/priorities', [TasksController::class, 'sync'])->name('tasks.sync');
        Route::get('/tasks/create', [TasksController::class, 'create'])->name('tasks.create');
        Route::post('/tasks/{task}', [TasksController::class, 'update'])->name('tasks.update');
        Route::delete('/tasks/{task}', [TasksController::class, 'destroy'])->name('tasks.delete');

        Route::get('/projects', [ProjectsController::class, 'index'])->name('projects.index');
        Route::post('/projects', [ProjectsController::class, 'store'])->name('projects.store');
        Route::get('/projects/create', [ProjectsController::class, 'create'])->name('projects.create');
        Route::get('/projects/{project:hash_id}', [ProjectsController::class, 'show'])->name('projects.show');
        Route::post('/projects/{project:hash_id}', [ProjectsController::class, 'update'])->name('projects.update');
        Route::get('/projects/{project:hash_id}/edit', [ProjectsController::class, 'create'])->name('projects.edit');

        Route::get('/projects/{project:hash_id}/tasks', [ProjectTasksController::class, 'index'])->name('projects.tasks');
        Route::post('/projects/{project:hash_id}/tasks', [ProjectTasksController::class, 'store'])->name('project_task.store');



    });

