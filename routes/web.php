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
Route::get('/customer/beneficiary/add_business_entity', [App\Http\Controllers\BeneficiaryController::class, 'add_business_entity']);
Route::get('/customer/beneficiary/viewbusiness_entity/{id}', [App\Http\Controllers\BeneficiaryController::class, 'viewbusiness_entity']);
Route::get('/customer/beneficiary/viewindividual/{id}', [App\Http\Controllers\BeneficiaryController::class, 'viewindividual']);

Route::post('/customer/beneficiary/add_business_entity', [App\Http\Controllers\BeneficiaryController::class, 'store_business_entity']);
Route::get('/customer/beneficiary/view', [App\Http\Controllers\BeneficiaryController::class, 'view']);
Route::post('/customer/beneficiary/add_individual', [App\Http\Controllers\BeneficiaryController::class, 'store_individual']);
Route::get('/customer/liptm/view', [App\Http\Controllers\CustomerPanelPlansController::class, 'index']);
Route::get('/customer/liptm/viewdetails/{id}', [App\Http\Controllers\CustomerPanelPlansController::class, 'viewdetails']);


Route::get('/admin/home', [App\Http\Controllers\AdminController::class, 'index']);
Route::post('/admin/add_users', [App\Http\Controllers\AdminController::class, 'add_users']);
Route::get('/admin/plans', [App\Http\Controllers\PlansController::class, 'index']);
Route::post('/admin/plans', [App\Http\Controllers\PlansController::class, 'store']);
Route::post('/admin/plans/add_features', [App\Http\Controllers\PlansController::class, 'add_features']);
Route::get('/admin/plans/delete_feature', [App\Http\Controllers\PlansController::class, 'delete_feature']);
Route::get('/admin/plans/edit/{id}', [App\Http\Controllers\PlansController::class, 'edit_view']);
Route::post('/admin/plans/edit/{id}', [App\Http\Controllers\PlansController::class, 'edit_save']);


Route::get('/admin/plans/particular', [App\Http\Controllers\PlansParticularController::class, 'index']);
Route::get('/admin/advocates/view', [App\Http\Controllers\HomeController::class, 'advocates_view']);
Route::get('/admin/advocates/view/{id}', [App\Http\Controllers\HomeController::class, 'advocates_view_details']);
Route::get('/admin/advocates/addcases/{id}', [App\Http\Controllers\AdvocateCasesAdminController::class, 'advocates_addcases']);
Route::post('/admin/advocates/addcases/{id}', [App\Http\Controllers\AdvocateCasesAdminController::class, 'advocates_addcases_save']);

Route::post('/admin/plans/particular', [App\Http\Controllers\PlansParticularController::class, 'store']);
Route::post('/admin/plans/particular/update', [App\Http\Controllers\PlansParticularController::class, 'update']);
Route::get('admin/plans/PlansStructure', [App\Http\Controllers\PlansStructureController::class, 'index']);
Route::post('admin/plans/PlansStructure', [App\Http\Controllers\PlansStructureController::class, 'store']);
Route::get('admin/plans/particular/change_can_avail', [App\Http\Controllers\PlansParticularController::class, 'change_can_avail']);
Route::get('/admin/customers/view', [App\Http\Controllers\AdminController::class, 'customers_view']);
Route::get('/admin/customers/viewplans/{id}', [App\Http\Controllers\CustomerPlansController::class, 'customers_viewplans']);
Route::post('/admin/customers/viewplans/{id}', [App\Http\Controllers\CustomerPlansController::class, 'customers_viewplans_store']);

Route::get('/admin/customers/viewplans/{id}/details/{customer_plans_id}', [App\Http\Controllers\CustomerPlansController::class, 'customers_viewplansdetails']);

///////////adv 
Route::get('advocate/mycases', [App\Http\Controllers\AdvocateController::class, 'mycases']);

Route::get('advocate/home', [App\Http\Controllers\AdvocateController::class, 'index']);

Route::get('advocate/empanellment', [App\Http\Controllers\EmpanellmentDataController::class, 'index']);
Route::get('advocate/empanellment_add', [App\Http\Controllers\EmpanellmentDataController::class, 'add']);
Route::post('advocate/empanellment_add', [App\Http\Controllers\EmpanellmentDataController::class, 'store']);
Route::get('advocate/bank_details', [App\Http\Controllers\BankDetailsController::class, 'index']);
Route::post('advocate/bank_details', [App\Http\Controllers\BankDetailsController::class, 'store']);
Route::get('advocate/edit_bank_details', [App\Http\Controllers\BankDetailsController::class, 'edit_bank_details']);
Route::post('advocate/edit_bank_details', [App\Http\Controllers\BankDetailsController::class, 'save_edit']);
Route::get('advocate/empanellment_complete', [App\Http\Controllers\AdvocateEmpanellmentComplete::class, 'index']);
Route::get('advocate/empanellment_complete/send', [App\Http\Controllers\AdvocateEmpanellmentComplete::class, 'send']);
Route::get('advocate/empanellment_complete/educational_data', [App\Http\Controllers\AdvocateEmpanellmentComplete::class, 'educational_data']);
Route::get('advocate/empanellment_complete/educational_data/delete/{id}', [App\Http\Controllers\AdvocateEmpanellmentComplete::class, 'educational_data_delete']);
Route::post('advocate/empanellment_complete/educational_data', [App\Http\Controllers\AdvocateEmpanellmentComplete::class, 'educational_data_store']);
Route::post('advocate/empanellment_complete/educational_data/update', [App\Http\Controllers\AdvocateEmpanellmentComplete::class, 'educational_data_update']);
Route::post('advocate/empanellment_complete/educational_data/save_new', [App\Http\Controllers\AdvocateEmpanellmentComplete::class, 'educational_data_save_new']);
Route::get('advocate/empanellment_complete/existing_empanelment', [App\Http\Controllers\ExistingEmpanelmentController::class, 'existing_empanelment']);
Route::post('advocate/empanellment_complete/existing_empanelment', [App\Http\Controllers\ExistingEmpanelmentController::class, 'existing_empanelment_store']);
Route::get('advocate/empanellment_complete/existing_empanelment/delete/{delete}', [App\Http\Controllers\ExistingEmpanelmentController::class, 'delete']);
Route::get('advocate/empanellment_complete/MainCasesHandeled', [App\Http\Controllers\MainCasesHandeledController::class, 'index']);
Route::post('advocate/empanellment_complete/MainCasesHandeled', [App\Http\Controllers\MainCasesHandeledController::class, 'store']);
Route::get('advocate/empanellment_complete/MainCasesHandeled/delete/{id}', [App\Http\Controllers\MainCasesHandeledController::class, 'delete']);
Route::get('advocate/empanellment_complete/EmpanellmentDocuments', [App\Http\Controllers\EmpanellmentDocumentsController::class, 'index']);
Route::post('advocate/empanellment_complete/EmpanellmentDocuments', [App\Http\Controllers\EmpanellmentDocumentsController::class, 'store']);
Route::get('advocate/empanellment_complete/EmpanellmentDocuments/delete/{id}', [App\Http\Controllers\EmpanellmentDocumentsController::class, 'delete']);



///////// end adv
Route::get('admin/customers/viewbeneficiary/{id}', [App\Http\Controllers\AdminController::class, 'AdminviewbeneficiaryCustomer']);
Route::get('admin/customers/viewbeneficiary/{id}/viewindividual/{beneficiary_id}', [App\Http\Controllers\AdminController::class, 'AdminviewbeneficiaryIndividualCustomer']);
Route::get('admin/customers/viewbeneficiary/{id}/viewbusiness_entity/{beneficiary_id}', [App\Http\Controllers\AdminController::class, 'AdminviewbeneficiaryBusinessEntityCustomer']);
