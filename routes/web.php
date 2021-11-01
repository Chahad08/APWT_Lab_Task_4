<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pageController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\editController;
use App\Http\Controllers\adminsController;
use Illuminate\Http\Request;


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


Route::get('/', [pageController::class, 'home'])->name('home');
//login Controller Student
Route::get('/login', [loginController::class, 'login'])->name('login');
Route::post('/login', [loginController::class, 'loginConfirm'])->name('login');
//logout
Route::get('/logout', [loginController::class, 'logout'])->name('logout');
//AdminLogin
Route::get('/admin', [loginController::class, 'adminlogin'])->name('admin');
Route::post('/admin', [loginController::class, 'adminloginConfirm'])->name('admin');
//logout
Route::get('/adminlogout', [loginController::class, 'Alogout'])->name('Alogout');

//registration
Route::get('/register', [registerController::class, 'register'])->name('register');
Route::post('/register', [registerController::class, 'registration'])->name('register');

//editprofilestudent
Route::get('/profile', [editController::class, 'editProfile'])->name('editprofile')->middleware('ValidUser');
Route::post('/profile', [editController::class, 'updateData'])->name('editprofile')->middleware('ValidUser');
//Admin Profile
Route::get('/adminprofile', [editController::class, 'admineditProfile'])->name('admineditprofile')->middleware('ValidAdmin');
Route::post('/adminprofile', [editController::class, 'adminupdateData'])->name('admineditprofile')->middleware('ValidAdmin');

//Admin dashboard
Route::get('/admin/dash', [pageController::class,'adminDash'])->name('adminDash')->middleware('ValidAdmin');

//Create Admin
Route::get('/admins/create',[adminsController::class,'create'])->name('admins.create');
Route::post('/admins/create',[adminsController::class,'createSubmit'])->name('admins.create');

//Admin List
Route::get('/admins/list', [adminsController::class, 'list'])->name('admins.list');


//Admin Edit And Delete
Route::get('/admins/edit/{id}/{name}',[adminsController::class,'edit']);
Route::post('/admins/edit',[adminsController::class,'editSubmit'])->name('admin.edit');
Route::get('/admins/delete/{id}/{name}',[adminsController::class,'delete']);

//Admin User List
Route::get('/admins/Users', [adminsController::class, 'Userlist'])->name('admins.Userlist');
Route::get('/admins/Useredit/{id}/{name}',[adminsController::class,'Useredit']);
Route::post('/admins/Useredit',[adminsController::class,'UsereditSubmit'])->name('admin.Useredit');
Route::get('/admins/Userdelete/{id}/{name}',[adminsController::class,'Userdelete']);


//Admin Agent List
Route::get('/admins/Agent', [adminsController::class, 'Agentlist'])->name('admins.Agentlist');
Route::get('/admins/Agentedit/{id}/{name}',[adminsController::class,'Agentedit']);
Route::post('/admins/Agentedit',[adminsController::class,'AgenteditSubmit'])->name('admin.Agentedit');
Route::get('/admins/Agentdelete/{id}/{name}',[adminsController::class,'Agentdelete']);
