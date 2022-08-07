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
    return view('welcome');
});

Auth::routes();
Route::any('/logout', function () {
  Auth::logout();
    return redirect('login');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/customer/beneficiary', [App\Http\Controllers\BeneficiaryController::class, 'index']);
Route::get('/customer/beneficiary/add_individual', [App\Http\Controllers\BeneficiaryController::class, 'add_individual']);
Route::get('/customer/beneficiary/view', [App\Http\Controllers\BeneficiaryController::class, 'view']);
Route::post('/customer/beneficiary/add_individual', [App\Http\Controllers\BeneficiaryController::class, 'store_individual']);


Route::get('/admin/home', [App\Http\Controllers\AdminController::class, 'index']);
Route::get('/admin/plans', [App\Http\Controllers\PlansController::class, 'index']);
Route::post('/admin/plans', [App\Http\Controllers\PlansController::class, 'store']);
Route::post('/admin/plans/add_features', [App\Http\Controllers\PlansController::class, 'add_features']);
Route::get('/admin/plans/delete_feature', [App\Http\Controllers\PlansController::class, 'delete_feature']);
Route::get('/admin/plans/edit/{id}', [App\Http\Controllers\PlansController::class, 'edit_view']);
Route::post('/admin/plans/edit/{id}', [App\Http\Controllers\PlansController::class, 'edit_save']);


Route::get('/admin/plans/particular', [App\Http\Controllers\PlansParticularController::class, 'index']);
Route::post('/admin/plans/particular', [App\Http\Controllers\PlansParticularController::class, 'store']);
Route::post('/admin/plans/particular/update', [App\Http\Controllers\PlansParticularController::class, 'update']);
Route::get('admin/plans/PlansStructure', [App\Http\Controllers\PlansStructureController::class, 'index']);
Route::post('admin/plans/PlansStructure', [App\Http\Controllers\PlansStructureController::class, 'store']);
Route::get('admin/plans/particular/change_can_avail', [App\Http\Controllers\PlansParticularController::class, 'change_can_avail']);
///////////adv 
Route::any('advocate/home', [App\Http\Controllers\AdvocateController::class, 'index']);




///////// end adv
