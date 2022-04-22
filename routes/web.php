<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudyGroupController;
use App\Http\Controllers\TabController;
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

Route::match(['GET', 'POST'],'/', [StudentController::class, 'index'])->name('admin.students');
Route::get('/create', [StudentController::class, 'create'])->name('admin.students.create');
Route::post('/create', [StudentController::class, 'store'])->name('admin.students.store');
Route::get('/edit/{student}', [StudentController::class, 'edit'])->name('admin.students.edit');
Route::post('/edit/{student}', [StudentController::class, 'update'])->name('admin.students.update');
Route::get('/study_groups', [StudyGroupController::class, 'index'])->name('admin.study_groups');

