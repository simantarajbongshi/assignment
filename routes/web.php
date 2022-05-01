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
    return view('index');
});

// Login to Dashboard
 Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 'App\Http\Controllers\LoginController@index')->name('dashboard');

// Logout
Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');

// Admin
Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/employee/dashboard', 'App\Http\Controllers\LoginController@admin')->name('admin.dashboard');
Route::middleware(['auth:sanctum', 'verified', 'admin'])->match(['get', 'post'], '/employee/addleave', 'App\Http\Controllers\LeaveController@addleave')->name('addleave');
Route::middleware(['auth:sanctum', 'verified', 'admin'])->match(['get', 'post'], '/employee/approvedleave', 'App\Http\Controllers\LeaveController@approvedleave')->name('approvedleave');
Route::middleware(['auth:sanctum', 'verified', 'admin'])->match(['get', 'post'], '/employee/rejectedleave', 'App\Http\Controllers\LeaveController@rejectedleave')->name('rejectedleave');

// Superadmin
Route::middleware(['auth:sanctum', 'verified', 'superadmin'])->match(['get', 'post'],'/hr/dashboard', 'App\Http\Controllers\LoginController@superadmin')->name('superadmin.dashboard');

Route::middleware(['auth:sanctum', 'verified', 'superadmin'])->match(['get', 'post'],'/hr/appliedleave', 'App\Http\Controllers\LeaveController@appliedleave')->name('appliedleave');
Route::middleware(['auth:sanctum', 'verified', 'superadmin'])->get('/hr/status/appliedleave', 'App\Http\Controllers\LeaveController@appliedleaveedit')->name('changeleavestatus');
Route::middleware(['auth:sanctum', 'verified', 'superadmin'])->match(['get', 'post'],'/hr/pastapplications', 'App\Http\Controllers\LeaveController@pastapplications')->name('pastapplications');
Route::middleware(['auth:sanctum', 'verified', 'superadmin'])->match(['get', 'post'],'/hr/pastapplicationsrejected', 'App\Http\Controllers\LeaveController@pastapplicationsrejected')->name('pastapplicationsrejected');


// for employee
// Route::match(['get', 'post'], '/admin/addleave', 'App\Http\Controllers\LeaveController@addleave')->name('addleave');
// Route::match(['get', 'post'], '/admin/applicationstatus', 'App\Http\Controllers\LeaveController@applicationtaus')->name('applicationstatus');



// for HR
// Route::match(['get', 'post'], '/superadmin/appliedleave', 'App\Http\Controllers\LeaveController@appliedleave')->name('appliedleave');

// Route::get('/superadmin/status/appliedleave', 'App\Http\Controllers\LeaveController@appliedleaveedit')->name('changeleavestatus');

// Route::match(['get', 'post'], '/superadmin/pastapplications', 'App\Http\Controllers\LeaveController@pastapplications')->name('pastapplications');
// Route::match(['get', 'post'], '/superadmin/pastapplicationsrejected', 'App\Http\Controllers\LeaveController@pastapplicationsrejected')->name('pastapplicationsrejected');