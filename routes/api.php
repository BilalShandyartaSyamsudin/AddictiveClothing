<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiAuthController;
use App\Http\Controllers\API\ApiRegisterController;
use App\Http\Controllers\API\ApiProdukController;
use App\Http\Controllers\API\UserController;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
Route::middleware([EnsureFrontendRequestsAreStateful::class])->group(function () {
    Route::get('/users', [UserController::class, 'viewLoggedInUser']);
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [ApiAuthController::class, 'login']);
Route::post('/register', [ApiRegisterController::class, 'store']);
Route::get('/produk', [ApiProdukController::class, 'produk']);

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [ApiAuthController::class, 'logout']);
});