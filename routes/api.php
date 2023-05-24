<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\ApiRegisterController;


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', [ApiRegisterController::class, 'store']);