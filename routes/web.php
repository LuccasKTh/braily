<?php

use App\Http\Controllers\EducationController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LessonWordController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\TopicWordController;
use App\Http\Controllers\UserRoleController;
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

Route::get('/', function () {
    Auth::loginUsingId(2);

    return to_route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::resource('/student', StudentController::class);
    Route::resource('/note', NoteController::class);
    Route::resource('/topic', TopicController::class);
    Route::resource('/topicCreated', TopicWordController::class);
    Route::resource('/lesson', LessonController::class);
    Route::resource('/lessonCreated', LessonWordController::class);

    Route::prefix('admin')->middleware(['role:Admin'])->group(function () {
        Route::resource('/skill', SkillController::class);
        Route::resource('/education', EducationController::class);
        Route::resource('/userRole', UserRoleController::class);
        Route::resource('/teacher', TeacherController::class);
    });
});

require __DIR__.'/auth.php';
