<?php

use App\Http\Controllers\ApiDownloadImageController;
use App\Http\Controllers\CarouselApiController;
use App\Http\Controllers\CategoryApiController;
use App\Http\Controllers\ProductApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/products', ProductApiController::class);
Route::resource('/categories', CategoryApiController::class);
Route::resource('/carousels', CarouselApiController::class);
Route::get('/getImage/{path}/{imagename}', [ApiDownloadImageController::class, 'index']);
// Route::get('/download/{filename}', [ProductApiController::class, 'downloadImage']);
