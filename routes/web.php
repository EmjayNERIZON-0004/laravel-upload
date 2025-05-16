<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeController2;

use App\Http\Controllers\ManageClientController;
use App\Http\Controllers\ManageEmployeeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserAccountController;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
// // Route::resource('manageemployee',PostController::class);

// Route:: resource('/manageclient',ManageClientController::class);

// Route::get('/profile', [PagesController::class,'view_profile'])->name('route_profile');
// Route::get('/dashboard', [PagesController::class,'view_dashboard'])->name('route_dashboard');
// Route::get('/service', [PagesController::class,'view_service'])->name('route_service');
// Route::get('/contact', [PagesController::class,'view_contact'])->name('route_contact');

// Route::group(['prefix' => 'administrator'],function(){
//     Route::get('/dashboard', [AdministratorController::class,'dashboard']) ;
//     Route::get('/contact', [AdministratorController::class,'contact']) ;
//     Route::get('/profile', [AdministratorController::class,'profile']) ;   
// });
 

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/EmployeeList',[ManageEmployeeController::class,'index'])->name('routeName_employeelist');


Route::get('greet/{name?}',[EmployeeController::class,'greet']);

Route::get('/profile', [PagesController::class,'profile'])->name('route_profile')->middleware(['maintenance','sessionUser']);

Route::get('/dashboard', [PagesController::class,'dashboard'])->name('route_dashboard')->middleware(['maintenance','sessionUser']);

Route::get('/service', [PagesController::class,'service'])->name('route_service')->middleware(['maintenance','sessionUser']);

Route::get('/contact', [PagesController::class,'contact'])->name('route_contact')->middleware(['maintenance','sessionUser']);

Route::get('/controlStructure/{grade?}',[EmployeeController::class,'employee'])->name('route_control')->middleware(['maintenance','sessionUser']);
Route::resource('/employees',ManageEmployeeController::class)->middleware(['maintenance','sessionUser']);
Route::get('/page',[PagesController::class,'test']);
Route::get('/employees/{id}/edit', [ManageEmployeeController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{id}', [ManageEmployeeController::class, 'update'])->name('employees.update');



Route::get('/logs', [PagesController::class, 'showLogs'])->middleware(['maintenance','sessionUser']);

Route::get('/maintenance',[PagesController::class,'maintenance_down']);
 

Route::get('/new_user',function(){
    return view ('newUserAccount');
});
Route::get('/login',function(){
    return view('login');
});
 

Route::get('/loginForm', [UserAccountController::class, 'login_form'])->name('login-form');
Route::post('/loginSubmit', [UserAccountController::class, 'login'])->name('login-submit');


Route::get('/update-password',function(){
    return view ('update_password');
    
});Route::get('/update-password', [UserAccountController::class, 'showUpdateForm'])->name('password.update.form');
Route::post('/update-password', [UserAccountController::class, 'updatePassword'])->name('password.update.submit');


Route::post('/store-account',[UserAccountController::class,'store'])->name('accounts.store');

Route::get('/logout', [UserAccountController::class, 'logout'])->name('logout');



Route::middleware(['sessionUser'])->group(function () {


Route::get('/userdashboard', [UserAccountController::class, 'dashboard'])->name('user-dashboard');

Route::get('/admin-dashboard', [UserAccountController::class, 'admin'])->name('admin.dashboard');
});use App\Http\Controllers\UploadController;
use App\Models\UserAccount;

Route::post('/upload', [UploadController::class, 'store'])->name('upload.store');
Route::get('/images', [UploadController::class, 'index'])->name('images.index');


Route::post('/admin/users/{id}', [AdministratorController::class, 'toggleStatus'])->name('status');
