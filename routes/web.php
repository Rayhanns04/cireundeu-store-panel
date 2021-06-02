<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [DashboardController::class, 'index']);

Route::prefix('/auth')->group(function() {
    Route::get('/', [AuthController::class, 'index']);
});

Route::prefix('/products')->group(function() {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/create', [ProductController::class, 'create']);
    Route::post('/save-crate', [ProductController::class, 'store']);
    Route::get('/edit/{id}', [ProductController::class, 'edit']);
    Route::post('/save-edit/{id}', [ProductController::class, 'update']);
    Route::get('/{id}', [ProductController::class, 'destroy']);
});

Route::prefix('/categories')->group(function() {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/create', [CategoryController::class, 'create']);
    Route::post('/save-crate', [CategoryController::class, 'store']);
    Route::get('/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('/save-edit/{id}', [CategoryController::class, 'update']);
    Route::get('/{id}', [CategoryController::class, 'destroy']);
});
