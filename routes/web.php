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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Project categories
Route::get('/project-categories', [App\Http\Controllers\ProjectCategoryController::class, 'index'])->name('project_category.index');
Route::get('/project-categories/create', [App\Http\Controllers\ProjectCategoryController::class, 'create'])->name('project_category.create');
Route::post('/project-categories/store', [App\Http\Controllers\ProjectCategoryController::class, 'store'])->name('project_category.store');
Route::get('/project-categories/edit/{id}', [App\Http\Controllers\ProjectCategoryController::class, 'edit'])->name('project_category.edit');
Route::put('/project-categories/update/{id}', [App\Http\Controllers\ProjectCategoryController::class, 'update'])->name('project_category.update');
Route::delete('/project-categories/delete/{id}', [App\Http\Controllers\ProjectCategoryController::class, 'delete'])->name('project_category.delete');

// Projects
Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'index'])->name('project.index');
Route::get('/projects/create', [App\Http\Controllers\ProjectController::class, 'create'])->name('project.create');
Route::post('/projects/store', [App\Http\Controllers\ProjectController::class, 'store'])->name('project.store');
Route::get('/projects/edit/{id}', [App\Http\Controllers\ProjectController::class, 'edit'])->name('project.edit');
Route::put('/projects/update/{id}', [App\Http\Controllers\ProjectController::class, 'update'])->name('project.update');
Route::delete('/projects/delete/{id}', [App\Http\Controllers\ProjectController::class, 'delete'])->name('project.delete');

