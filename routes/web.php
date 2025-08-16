<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\student\StudentTestController;
use App\Http\Controllers\student\DashboardController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\admin\TeacherController;
use App\Http\Controllers\admin\SchoolYearController;
use App\Http\Controllers\admin\TestResultController;
use App\Http\Controllers\admin\QuestionController;
use App\Http\Controllers\Admin\MajorController; // Controller untuk Jurusan
use App\Http\Controllers\Admin\ClassController; // Controller untuk Kelas

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login-role', function () {
    return view('auth.choose_role');
})->name('login.role');

Route::get('/login-role', function () {
    return view('auth.choose_role');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

        // Admin Routes for Students, Teachers, School Year, and Test Results
        Route::get('/student', [StudentController::class, 'index'])->name('student.index');
        Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
        Route::get('/student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
        Route::post('/student', [StudentController::class, 'store'])->name('student.store');
        Route::put('/student/{id}', [StudentController::class, 'update'])->name('student.update');
        Route::delete('/student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');

        Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher.index');
        Route::get('/teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
        Route::post('/teacher', [TeacherController::class, 'store'])->name('teacher.store');
        Route::get('/teacher/edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
        Route::put('/teacher/{id}', [TeacherController::class, 'update'])->name('teacher.update');
        Route::delete('/teacher/{id}', [TeacherController::class, 'destroy'])->name('teacher.destroy');

        Route::get('/schoolyear', [SchoolYearController::class, 'index'])->name('schoolyear.index');
        Route::get('/schoolyear/create', [SchoolYearController::class, 'create'])->name('schoolyear.create');
        Route::post('/schoolyear', [SchoolYearController::class, 'store'])->name('schoolyear.store');
        Route::get('/schoolyear/edit/{id}', [SchoolYearController::class, 'edit'])->name('schoolyear.edit');
        Route::put('/schoolyear/{id}', [SchoolYearController::class, 'update'])->name('schoolyear.update');
        Route::delete('/schoolyear/{id}', [SchoolYearController::class, 'destroy'])->name('schoolyear.destroy');

        Route::get('/test-results', [TestResultController::class, 'index'])->name('test_result.index');
        Route::get('/test-result/{id}', [TestResultController::class, 'show'])->name('test_result.show');

        // Kelola Jurusan
        Route::resource('majors', MajorController::class); // Mengelola Jurusan

        // Kelola Kelas
        Route::resource('classes', ClassController::class); // Mengelola Kelas

        // Question Routes
        Route::resource('questions', QuestionController::class); // Mengelola Soal
    
        // Route AJAX
    Route::get('/get-majors/{schoolYearId}', [StudentController::class, 'getMajors']);
    Route::get('/get-classes/{majorId}', [StudentController::class, 'getClasses']);


    Route::get('admin/question/import', [QuestionController::class, 'showImportForm'])->name('admin.question.import.form');
    Route::post('admin/question/import', [QuestionController::class, 'import'])->name('admin.question.import');

    });
});

// Teacher Routes
    Route::prefix('teacher')->as('teacher.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    
    Route::middleware(['auth', 'role:teacher'])->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\teacher\DashboardController::class, 'teacherDashboard'])->name('dashboard');
    
        Route::get('/test-results', [\App\Http\Controllers\teacher\TestResultController::class, 'index'])->name('test.index');
        Route::get('/test-results/{id}', [TestResultController::class, 'show'])->name('test.result');
    });
});

// Student Routes
Route::prefix('student')->as('student.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    
    Route::middleware(['auth', 'role:student'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/test', [StudentTestController::class, 'form'])->name('test');
        Route::post('/test/submit', [StudentTestController::class, 'submit'])->name('test.submit');
        Route::get('/test/result', [StudentTestController::class, 'hasil'])->name('result');
        Route::get('/test-result/{id}', [TestResultController::class, 'show'])->name('student.test_result.show');
    });
});
