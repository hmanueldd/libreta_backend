<?php

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\DireccionController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\TelefonoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**CONTACTO */
Route::get('/contacto',[ ContactoController::class,'index']);
Route::get('/contacto/{id}',[ ContactoController::class,'show']);
Route::delete('/contacto/{id}',[ ContactoController::class,'destroy']);
Route::post('/contacto',[ ContactoController::class,'store']);
Route::put('/contacto/{id}',[ ContactoController::class,'update']);

/** DIRECCIONES */
Route::get('/direccion',[ DireccionController::class,'index']);
Route::get('/direccion/{id}',[ DireccionController::class,'show']);
Route::delete('/direccion/{id}',[ DireccionController::class,'destroy']);
Route::post('/direccion',[ DireccionController::class,'store']);
Route::put('/direccion/{id}',[ DireccionController::class,'update']);

/** TELEFONOS */
Route::get('/telefono',[ TelefonoController::class,'index']);
Route::get('/telefono/{id}',[ TelefonoController::class,'show']);
Route::delete('/telefono/{id}',[ TelefonoController::class,'destroy']);
Route::post('/telefono',[ TelefonoController::class,'store']);
Route::put('/telefono/{id}',[ TelefonoController::class,'update']);

/** EMAILS */
Route::get('/email',[ EmailController::class,'index']);
Route::get('/email/{id}',[ EmailController::class,'show']);
Route::delete('/email/{id}',[ EmailController::class,'destroy']);
Route::post('/email',[ EmailController::class,'store']);
Route::put('/email/{id}',[ EmailController::class,'update']);
