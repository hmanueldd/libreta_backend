<?php

use App\Http\Controllers\ContactoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/contactos',[ ContactoController::class,'index']);
