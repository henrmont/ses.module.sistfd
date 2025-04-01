<?php

use App\Http\Controllers\PacienteController;
use App\Http\Middleware\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::group(['middleware' => 'api', 'prefix' => 'paciente'], function ($router) {

    Route::get('get/pacientes', [PacienteController::class, 'getPacientes'])->middleware(Auth::class);

});
