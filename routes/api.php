<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DoctorRoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::controller(DoctorRoleController::class)->middleware('auth:sanctum')->prefix('doctor_roles')->group(function(){
    Route::get('/','index');
    Route::get('/{doctor_role}','show');
    Route::post('/','store');
    Route::put('/{doctor_role}','update');
    Route::delete('/{doctor_role}','destroy');
});


Route::post('register',[RegisterController::class,'store']);