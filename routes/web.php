<?php

use App\Http\Controllers\Master\AdminController;
use App\Http\Controllers\Master\AssignCourseController;
use App\Http\Controllers\Master\CourseController;
use App\Http\Controllers\Master\DashboardController;
use App\Http\Controllers\Master\DepartmentController;
use App\Http\Controllers\Master\ProgrammeController;
use App\Http\Controllers\Master\RoleController;
use App\Http\Controllers\Master\StudentController;
use App\Http\Controllers\Master\UserController;
use App\Http\Controllers\Student\CourseWorkController;
use App\Http\Controllers\StudentDetailController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/AdminDashboard', [AdminController::class, 'index'])->name('admin.home');
Route::get('/student/home',[StudentController::class,'index'])->name('student.home');
Route::get('/admin/dashboard',[DashboardController::class,'index'])->name('dashboard.admin');
Route::get('/admin/profile',[AdminController::class,'profile'])->name('admin.profile');

//users route
Route::get('/user/list',[UserController::class,'index'])->name('users');
Route::get('/user/create',[UserController::class,'create'])->name('user.create');
Route::post('/user/store',[UserController::class,'store'])->name('user.store');
Route::get('/user/edit/{id}',[UserController::class,'edit'])->name('user.edit');
Route::post('/user/update/{id}',[UserController::class,'update'])->name('user.update');
Route::post('/user/delete/{id}',[UserController::class,'destroy'])->name('user.destroy');
//roles

Route::get('/roles',[RoleController::class,'index'])->name('role.list');
Route::get('/create/role/{replicateid?}',[RoleController::class,'create'])->name('role.create');
Route::get('/edit-role/{roleid}',[RoleController::class,'create'])->name('role.edit');
Route::post('/save/role',[RoleController::class,'store'])->name('role.save');
Route::delete('/delete-role/{roleid}',[RoleController::class,'destroy'])->name('role.delete');

//department
Route::get('/department-list',[DepartmentController::class,'index'])->name('department.list');
Route::get('/create/department',[DepartmentController::class,'create'])->name('department.create');
Route::get('/edit/department/{departmentid}',[DepartmentController::class,'edit'])->name('department.edit');
Route::post('/save/department',[DepartmentController::class,'store'])->name('department.store');
Route::delete('/delete-department/{departmentid}',[DepartmentController::class,'destroy'])->name('department.delete');

//programme
Route::get('/programme-list',[ProgrammeController::class,'index'])->name('programme.list');
Route::get('/create/programme',[ProgrammeController::class,'create'])->name('programme.create');
Route::get('/edit-programme/{programmeid}',[ProgrammeController::class,'edit'])->name('programme.edit');
Route::post('/save-programme',[ProgrammeController::class,'store'])->name('programme.store');
Route::get('/programme/delete/{programmeid}',[ProgrammeController::class,'destroy'])->name('programme.destroy');

//course
Route::get('course/list',[CourseController::class,'index'])->name('course.list');
Route::get('/create/course',[CourseController::class,'create'])->name('course.create');
Route::get('/edit/course/{courseid}',[CourseController::class,'edit'])->name('course.edit');
Route::post('/save/course',[CourseController::class,'store'])->name('course.store');
Route::get('/course/delete/{courseid}',[CourseController::class,'destroy'])->name('course.destroy');
//assign
Route::get('/assign/course/list',[AssignCourseController::class,'assignCourse'])->name('assign.course');
Route::get('/assign/course',[AssignCourseController::class,'create'])->name('assignCourse.create');
Route::get('/assign/course/edit/{id}',[AssignCourseController::class,'edit'])->name('assignCourse.edit');
Route::post('/assign/store',[AssignCourseController::class,'store'])->name('assignCourse.store');

//student
Route::get('student/detail',[StudentDetailController::class,'index'])->name('student.detail');
//coursework
Route::get('/coursework',[CourseWorkController::class,'index'])->name('coursework.list');
Route::get('/create/coursework',[CourseWorkController::class,'create'])->name('coursework.create');
Route::get('/edit/coursework/{courseworkid}',[CourseWorkController::class,'edit'])->name('coursework.edit');
Route::post('/save/coursework',[CourseWorkController::class,'store'])->name('coursework.store');
