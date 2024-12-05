<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CageController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\CustomLoginController;

// Главная страница
Route::get('/', [HomeController::class, 'index'])->name('home');

// Маршруты для клеток
Route::get('/cages', [CageController::class, 'index'])->name('cages.index');
Route::post('/cages', [CageController::class, 'store'])->name('cages.store');
Route::get('/cages/create', [CageController::class, 'create'])->name('cages.create');
Route::get('/cages/{id}', [CageController::class, 'show'])->name('cages.show');

Route::middleware('auth')->group(function () {
    Route::delete('/cages/{id}', [CageController::class, 'destroy'])->name('cages.destroy');
    Route::get('/cages/{id}/edit', [CageController::class, 'edit'])->name('cages.edit');
    Route::put('/cages/{id}', [CageController::class, 'update'])->name('cages.update');
});

// Маршруты для животных
Route::get('/animals', [AnimalController::class, 'index'])->name('animals.index');
Route::post('/animals', [AnimalController::class, 'store'])->name('animals.store');
Route::get('/animals/create', [AnimalController::class, 'create'])->name('animals.create');
Route::get('/animals/{id}', [AnimalController::class, 'show'])->name('animals.show');

Route::middleware('auth')->group(function () {
    Route::delete('/animals/{animal}', [AnimalController::class, 'destroy'])->name('animals.destroy');
    Route::get('/animals/{animal}/edit', [AnimalController::class, 'edit'])->name('animals.edit');
    Route::put('/animals/{animal}', [AnimalController::class, 'update'])->name('animals.update');
});

// Авторизация
Route::get('login', [CustomLoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [CustomLoginController::class, 'login']);
Route::get('logout', [CustomLoginController::class, 'logout'])->name('logout');
