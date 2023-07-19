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

Route::get('/', [AssetTrackerController::class, 'home'])->name('home')->middleware('auth');
Route::get('managedevices', [AssetTrackerController::class, 'managedevices'])->name('managedevices')->middleware('auth');
Route::get('adddevice', [AssetTrackerController::class , 'adddevice'])->name('adddevice')->middleware('auth');
Route::get('device/{device}/edit', [AssetTrackerController::class, 'editdevice'])->name('editdevice')->middleware('auth');
Route::post('postdevice', [AssetTrackerController::class, 'postdevice'])->name('postdevice');
Route::put('device/{device}', [AssetTrackerController::class, 'updatedevice'])->name('updatedevice');
Route::delete('device/{device}', [AssetTrackerController::class, 'deletedevice'])->name('deletedevice');



Route::get('managedepartments', [AssetTrackerController::class , 'managedepartments'])->name('managedepartments')->middleware('auth');
Route::get('adddepartment', [AssetTrackerController::class, 'adddepartment'])->name('adddepartment')->middleware('auth');
Route::get('department/{department}/edit', [AssetTrackerController::class, 'editdepartment'])->name('editdepartment')->middleware('auth');
Route::post('postdepartment', [AssetTrackerController::class, 'postdepartment'])->name('postdepartment');
Route::put('department/{department}', [AssetTrackerController::class, 'updatedepartment'])->name('updatedepartment');
Route::delete('department/{department}', [AssetTrackerController::class, 'deletedepartment'])->name('deletedepartment');


Route::get('managestudents', [AssetTrackerController::class, 'managestudents'])->name('managestudents')->middleware('auth');
Route::get('addstudent', [AssetTrackerController::class, 'addstudent'])->name('addstudent')->middleware('auth');
Route::get('student/{student}/edit', [AssetTrackerController::class, 'editstudent'])->name('editstudent')->middleware('auth');
Route::post('poststudent', [AssetTrackerController::class, 'poststudent'])->name('poststudent');
Route::put('student/{student}', [AssetTrackerController::class, 'updatestudent'])->name('updatestudent');
Route::delete('student/{student}', [AssetTrackerController::class, 'deletestudent'])->name('deletestudent');

Route::get('categories', [AssetTrackerController::class, 'managecategories'])->name('managecategories')->middleware('auth');
Route::get('addcategory', [AssetTrackerController::class, 'addcategory'])->name('addcategory')->middleware('auth');
Route::get('category/{category}/edit', [AssetTrackerController::class, 'editcategory'])->name('editcategory')->middleware('auth');
Route::post('postcategory', [AssetTrackerController::class, 'postcategory'])->name('postcategory');
Route::put('category/{category}', [AssetTrackerController::class, 'updatecategory'])->name('updatecategory');
Route::delete('category/{category}', [AssetTrackerController::class, 'deletecategory'])->name('deletecategory');


Route::get('signup', [AssetTrackerController::class, 'signup'])->name('signup');
Route::get('signin', [AssetTrackerController::class, 'signin'])->name('signin');
Route::post('storeadmin', [AssetTrackerController::class, 'storeadmin'])->name('storeadmin');
Route::post('authadmin', [AssetTrackerController::class, 'authadmin'])->name('authadmin');
Route::post('signout', [AssetTrackerController::class, 'signout'])->middleware('auth')->name('signout');

Route::get('download/{device}', [AssetTrackerController::class, 'download'])->name('download');