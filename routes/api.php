<?php

use App\Http\Controllers\PacienteController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

Route::group(['middleware' => 'api', 'prefix' => 'user'], function ($router) {

    Route::get('get/users', [UserController::class, 'getUsers'])->middleware(Auth::class);

});

Route::group(['middleware' => 'api', 'prefix' => 'role'], function ($router) {

    Route::get('get/roles', [RoleController::class, 'getRoles'])->middleware(Auth::class);
    Route::get('get/permissions', [RoleController::class, 'getPermissions'])->middleware(Auth::class);

});
