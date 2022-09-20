<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AttendancesController;
use App\Models\Kelas;
use App\Models\Study;
use App\Models\Student;
use App\Models\Semester;
use App\Models\schoolYear;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\JournalsController;
use App\Http\Controllers\ScheduleClassesController;
use App\Http\Controllers\SchedulesController;
use App\Http\Controllers\StudiesController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\SemestersController;
use App\Http\Controllers\SchoolYearsController;
use App\Http\Controllers\ScoresController;
use App\Http\Controllers\SearchCivitasController;
use App\Http\Controllers\UpdatePasswordController;
use App\Models\Announcement;
use App\Models\Mclass;
use App\Models\User;

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

Route::middleware(['guest'])->group(function(){
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
});

Route::middleware(['auth'])->group(function(){
    Route::get('/', function () {
        return view('index',[
            'announcements' => Announcement::latest()->take(3)->get(),
        ]);
    })->name('home');
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/biodata', [BiodataController::class, 'index']);
    Route::post('/updatePassword', [UpdatePasswordController::class, 'updatePassword']);
    Route::get('/civitas/search_student', [SearchCivitasController::class, 'searchStudents']);
    Route::get('/civitas/search_teacher', [SearchCivitasController::class, 'searchTeachers']);
    Route::get('/teacher/announcements', [AnnouncementController::class, 'showTeachers']);
});

Route::middleware(['admin'])->group(function(){
    Route::resource('/students', StudentsController::class);
    Route::get('/data_umum', function(){
        return view('admins.data_umum.index',[
            'title' => 'Data Umum',
            'classes' => Mclass::all(),
            'semesters' => Semester::all(),
            'schoolYears' => schoolYear::all(),
            'studies' => Study::all(),
        ]);
    });
    Route::post('/biodata', [BiodataController::class, 'updateAdmin']);
    // Route::resource('/data_umum/m_classes', ClassesController::class);
    Route::resource('/data_umum/mclasses', ClassesController::class);
    Route::resource('/data_umum/semesters', SemestersController::class);
    Route::resource('/data_umum/school_years', SchoolYearsController::class);
    Route::resource('/data_umum/studies', StudiesController::class);
    Route::resource('/teachers', TeachersController::class);
    Route::resource('/schedules', SchedulesController::class);
    Route::resource('/announcements', AnnouncementController::class);
});

Route::middleware(['teacher'])->group(function(){
    Route::post('/biodata', [BiodataController::class, 'updateTeacher']);
    Route::resource('/myworks/journals', JournalsController::class);
    Route::get('/myworks/attendances/showAttendance',[AttendancesController::class, 'showAttendance']);
    Route::get('/myworks/attendances/editAttendance',[AttendancesController::class, 'editAttendance']);
    Route::resource('/myworks/attendances', AttendancesController::class);
    Route::resource('/scores', ScoresController::class);
});

Route::middleware(['student'])->group(function(){
    
});