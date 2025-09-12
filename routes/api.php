<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\ReservationController;

// Routes d'authentification
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Routes protégées
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);
    
    // Routes des hôtels
    Route::apiResource('hotels', HotelController::class);
    
    // Routes des réservations
    Route::apiResource('reservations', ReservationController::class);
});

// Route publique pour récupérer les hôtels (sans authentification)
Route::get('/hotels', [HotelController::class, 'index']);
