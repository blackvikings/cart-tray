<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\dashboardController;
use App\Http\Controllers\Admin\categoriesController;
use App\Http\Controllers\Admin\productsController;
use App\Http\Controllers\Admin\managementController;
use App\Http\Controllers\Admin\PrescriptionController;
use App\Http\Controllers\Admin\MediaController;
use  App\Http\Controllers\Admin\CompositionController;
use App\Http\Controllers\Admin\MedicineRequestController;
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

Route::get('/', [LoginController::class, 'index'])->name('admin.login');
Route::post('admin', [LoginController::class, 'adminPosted'])->name('adminlogin');

Route::group(['middleware' => 'admin'], function(){
    Route::get("/admin_panel", [dashboardController::class,'index'])->name('admin.dashboard');
    Route::get('admin/logout', [LoginController::class, 'adminLogout'])->name('admin.logout');
    //categories
    Route::get('/admin_panel/categories', [categoriesController::class, 'index'])->name('admin.categories');
    Route::post('/admin_panel/categories', [categoriesController::class, 'posted']);

    Route::get('/admin_panel/categories/edit/{id}', [categoriesController::class, 'edit'])->name('admin.categories.edit');
    Route::post('/admin_panel/categories/edit/{id}', [categoriesController::class, 'update']);

    Route::get('/admin_panel/categories/delete/{id}', [categoriesController::class, 'delete'])->name('admin.categories.delete');
    Route::post('/admin_panel/categories/delete/{id}', [categoriesController::class, 'destroy']);

    //products
    Route::group(['middleware' => 'cors'], function(){
        Route::get('/admin_panel/products', [productsController::class,'index'])->name('admin.products');
    });


    Route::get('/admin_panel/products/create', [productsController::class, 'create'])->name('admin.products.create');
    Route::post('/admin_panel/products/create', [productsController::class, 'store']);

    Route::post('/admin_panel/products/import', [productsController::class, 'import'])->name('import');

    Route::get('/admin_panel/products/edit/{id}', [productsController::class, 'edit'])->name('admin.products.edit');
    Route::post('/admin_panel/products/edit/{id}', [productsController::class, 'update']);

    Route::get('/admin_panel/products/delete/{id}', [productsController::class, 'delete'])->name('admin.products.delete');
    Route::post('/admin_panel/products/delete/{id}', [productsController::class, 'destroy']);

    //order management
    Route::get('/admin_panel/management', [managementController::class, 'manage'])->name('admin.orderManagement');
    Route::post('/admin_panel/management', [managementController::class, 'update'])->name('admin.orderUpdate');

    //Prescription
    Route::get('/admin_panel/prescription', [PrescriptionController::class, 'index'])->name('admin.prescription');
    Route::get('/admin_panel/prescription/{id}', [PrescriptionController::class, 'show'])->name('admin.prescription.show');
    Route::get('/admin_panel/prescription/{id}/delete', [PrescriptionController::class, 'destroy'])->name('admin.prescription.delete');

    //media
    Route::get('/admin_panel/media', [MediaController::class, 'index'])->name('admin.media');
    Route::post('/admin_panel/media', [MediaController::class, 'store'])->name('admin.store');
    Route::get('/admin_panel/media/delete/{id}', [MediaController::class, 'destroy'])->name('admin.media.delete');

    //composition
    Route::get('/admin_panel/composition', [CompositionController::class, 'index'])->name('admin.composition');
    Route::post('/admin_panel/composition', [CompositionController::class, 'store'])->name('admin.composition.store');
    Route::get('/admin_panel/composition/{composition}', [CompositionController::class, 'edit'])->name('admin.composition.edit');
    Route::post('/admin_panel/composition/{composition}', [CompositionController::class, 'update'])->name('admin.composition.update');
    Route::get('/admin_panel/composition/delete/{composition}', [CompositionController::class, 'destroy'])->name('admin.composition.delete');

    //Requested medicines
    Route::get('/admin_panel/requested-medicine', [MedicineRequestController::class, 'index'])->name('admin.medicine-request');

});

//Route::get('/markasread', function (){
//    $_admin = \Illuminate\Support\Facades\Auth::guard('admin')->user();
//    $_admin->unreadNotifications->markAsRead();
//});
