<?php

use App\Http\Controllers\DiplomaController;
use App\Http\Controllers\DisciplineController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
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
    return redirect()->route('teachers');
});
Route::prefix('teachers')->group(function() {
    Route::get('/', [TeacherController::class, 'index'])->name('teachers');
    Route::get('/{teacher}/plan', [TeacherController::class, 'plan'])->name('teachers.plan');
    Route::get('/{teacher}/schedule', [TeacherController::class, 'schedule'])->name('teachers.schedule');
    Route::post('/create', [TeacherController::class, 'store'])->name('teachers.create');
    Route::post('/{teacher}', [TeacherController::class, 'update'])->name('teachers.edit');
    Route::post('/{teacher}/delete', [TeacherController::class, 'destroy'])->name('teachers.delete');
});
Route::prefix('students')->group(function() {
    Route::get('/', [StudentController::class, 'index'])->name('students');
    Route::post('/create', [StudentController::class, 'store'])->name('students.create');
    Route::post('/{student}', [StudentController::class, 'update'])->name('students.edit');
    Route::post('/{student}/delete', [StudentController::class, 'destroy'])->name('students.delete');
});
Route::prefix('disciplines')->group(function() {
    Route::get('/', [DisciplineController::class, 'index'])->name('disciplines');
    Route::post('/create', [DisciplineController::class, 'store'])->name('disciplines.create');
    Route::post('/{discipline}', [DisciplineController::class, 'update'])->name('disciplines.edit');
    Route::post('/{discipline}/delete', [DisciplineController::class, 'destroy'])->name('disciplines.delete');
});
Route::prefix('groups')->group(function() {
    Route::get('/', [GroupController::class, 'index'])->name('groups');
    Route::post('/create', [GroupController::class, 'store'])->name('groups.create');
    Route::post('/{group}', [GroupController::class, 'update'])->name('groups.edit');
    Route::post('/{group}/delete', [GroupController::class, 'destroy'])->name('groups.delete');
});
Route::prefix('plans')->group(function() {
    Route::get('/', [PlanController::class, 'index'])->name('plans');
    Route::post('/create', [PlanController::class, 'store'])->name('plans.create');
    Route::post('/{plan}', [PlanController::class, 'update'])->name('plans.edit');
    Route::post('/{plan}/delete', [PlanController::class, 'destroy'])->name('plans.delete');
});
Route::prefix('schedule')->group(function() {
    Route::get('/', [ScheduleController::class, 'index'])->name('schedules');
    Route::get('/{group}', [ScheduleController::class, 'show'])->name('schedules.view');
    Route::post('/{group}', [ScheduleController::class, 'update'])->name('schedules.edit');
});
Route::prefix('diplomas')->group(function() {
    Route::get('/', [DiplomaController::class, 'index'])->name('diplomas');
    Route::post('/{student}', [DiplomaController::class, 'update'])->name('diplomas.edit');
});
