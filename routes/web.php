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
})->name('home');


Route::get('devices', [AssetTrackerController::class, 'alldevices'])->name('devices');
Route::get('managedevices', [AssetTrackerController::class, 'managedevices'])->name('managedevices');
Route::get('adddevice', [AssetTrackerController::class , 'adddevice'])->name('adddevice');
Route::get('device/{device}/edit', [AssetTrackerController::class, 'editdevice'])->name('editdevice');
Route::post('postdevice', [AssetTrackerController::class, 'postdevice'])->name('postdevice');
Route::put('device/{device}', [AssetTrackerController::class, 'updatedevice'])->name('updatedevice');
Route::delete('device/{device}', [AssetTrackerController::class, 'deletedevice'])->name('deletedevice');


Route::get('departments', [AssetTrackerController::class, 'alldepartments'])->name('departments');
Route::get('managedepartments', [AssetTrackerController::class , 'managedepartments'])->name('managedepartments');
Route::get('adddepartment', [AssetTrackerController::class, 'adddepartment'])->name('adddepartment');
Route::get('department/{department}/edit', [AssetTrackerController::class, 'editdepartment'])->name('editdepartment');
Route::post('postdepartment', [AssetTrackerController::class, 'postdepartment'])->name('postdepartment');
Route::put('department/{department}', [AssetTrackerController::class, 'updatedepartment'])->name('updatedepartment');
Route::delete('department/{department}', [AssetTrackerController::class, 'deletedepartment'])->name('deletedepartment');

Route::get('students', [AssetTrackerController::class, 'allstudents'])->name('students');
Route::get('managestudents', [AssetTrackerController::class, 'managestudents'])->name('managestudents');
Route::get('addstudent', [AssetTrackerController::class, 'addstudent'])->name('addstudent');
Route::get('student/{student}/edit', [AssetTrackerController::class, 'editstudent'])->name('editstudent');
Route::post('poststudent', [AssetTrackerController::class, 'poststudent'])->name('poststudent');
Route::put('student/{student}', [AssetTrackerController::class, 'updatestudent'])->name('updatestudent');
Route::delete('student/{student}', [AssetTrackerController::class, 'deletestudent'])->name('deletestudent');

Route::get('categories', [AssetTrackerController::class, 'managecategories'])->name('managecategories');
Route::get('addcategory', [AssetTrackerController::class, 'addcategory'])->name('addcategory');
Route::get('category/{category}/edit', [AssetTrackerController::class, 'editcategory'])->name('editcategory');
Route::post('postcategory', [AssetTrackerController::class, 'postcategory'])->name('postcategory');
Route::put('category/{category}', [AssetTrackerController::class, 'updatecategory'])->name('updatecategory');
Route::delete('category/{category}', [AssetTrackerController::class, 'deletecategory'])->name('deletecategory');
