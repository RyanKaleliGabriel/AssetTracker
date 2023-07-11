<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetTrackerController;

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


Route::get('/devices', [AssetTrackerController::class, 'alldevices'])->name('devices');
Route::get('managedevices', [AssetTrackerController::class, 'managedevices'])->name('managedevices');
Route::get('adddevice', [AssetTrackerController::class , 'adddevice'])->name('adddevice');
Route::get('editdevice', [AssetTrackerController::class, 'editdevice'])->name('editdevice');

Route::get('/departments', [AssetTrackerController::class, 'alldepartments'])->name('departments');
Route::get('managedepartments', [AssetTrackerController::class , 'managedepartments'])->name('managedepartments');
Route::get('adddepartment', [AssetTrackerController::class, 'adddepartment'])->name('adddepartment');
Route::get('editdepartment', [AssetTrackerController::class, 'editdepartment'])->name('editdepartment');


Route::get('/students', [AssetTrackerController::class, 'allstudents'])->name('students');
Route::get('managestudents', [AssetTrackerController::class, 'managestudents'])->name('managestudents');
Route::get('addstudent', [AssetTrackerController::class, 'addstudent'])->name('addstudent');
Route::get('editstudent', [AssetTrackerController::class, 'editstudent'])->name('editstudent');


Route::get('/categories', [AssetTrackerController::class, 'managecategories'])->name('managecategories');
Route::get('addcategory', [AssetTrackerController::class, 'addcategory'])->name('addcategory');
Route::get('editcategory', [AssetTrackerController::class, 'editcategory'])->name('editcategory');


