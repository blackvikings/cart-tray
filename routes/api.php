<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductContoller;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\CompostionController;
use App\Http\Controllers\API\PrescriptionController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\MediaController;
use App\Http\Controllers\API\MedicineRequestController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('media/', [MediaController::class, 'index']);

Route::get('products/{category?}', [ProductContoller::class, 'list']);
Route::get('product/{id}', [ProductContoller::class, 'product']);
//Route::post('register', [RegisterController::class, 'register']);
Route::post('/login',[RegisterController::class,'postLogin']);
// Register
Route::post('/register',[RegisterController::class, 'postRegister']);
// Protected with APIToken Middleware
Route::get('categories', [CategoryController::class, 'index']);
Route::get('compositions', [CompostionController::class, 'index']);
Route::post('search', [ProductContoller::class, 'search']);

Route::middleware('APIToken')->group(function () {
    // Logout

    Route::post('/add-info/{token}', [ProfileController::class, 'addInfo']);
    Route::get('/profile/{token}', [ProfileController::class, 'profile']);
    Route::post('/profile-update/{token}', [ProfileController::class, 'updateProfile']);
    Route::post('/logout',[RegisterController::class, 'postLogout']);
    Route::post('upload-prescription', [PrescriptionController::class, 'upload']);
    Route::get('get-prescription/{token}', [PrescriptionController::class, 'getPrescription']);
    Route::get('cart-list/{token}', [ProductContoller::class, 'cartList']);
    Route::post('add-to-cart', [ProductContoller::class, 'addTocart']);
    Route::delete('remove-from-cart/{id}', [ProductContoller::class, 'removeCart']);
    Route::post('/order/{token}', [ProductContoller::class,'order']);
    Route::get('/history/{token}', [ProductContoller::class, 'history']);
    Route::get('/address/{token}', [ProductContoller::class, 'address']);
    Route::post('/address-update/{id}', [ProductContoller::class, 'updateAddress']);
    Route::post('/medicine-request/' , [MedicineRequestController::class, 'store']);
});
