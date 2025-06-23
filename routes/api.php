<?php

use App\Http\Controllers\Api\ProyectoController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/proyectos', [ProyectoController::class, 'index']);