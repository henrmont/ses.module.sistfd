<?php

use App\Http\Controllers\PacienteController;
use App\Http\Middleware\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::group(['middleware' => 'api'], function ($router) {

    Route::get('welcome', function() {
        return response()->json('Welcome to SISTFD API', 200);
    })->middleware(Auth::class);

});
