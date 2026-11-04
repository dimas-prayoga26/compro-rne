<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\HargaController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function(){
    Route::get('/', [PageController::class, 'home'])->name('home');
    Route::get('/visimisi', [PageController::class, 'visimisi'])->name('visimisi');
    Route::get('/legalitas', [PageController::class, 'legalitas'])->name('legalitas');
    Route::get('/harga', [PageController::class, 'harga'])->name('harga');
    Route::get('/galery', [PageController::class, 'galery'])->name('galery');
    Route::get('/contact', [PageController::class, 'contact'])->name('contact');
    Route::get('/loginRNE', [AuthController::class, 'login'])->name('login');
    Route::post('/loginRNE/auth', [AuthController::class, 'authenticate'])->name('loginAuth');
});

Route::prefix('/admin')->middleware('auth')->group(function(){
    Route::resource('/profile', ProfileController::class)->only(['index', 'update']);
    Route::resource('/lokasi', LokasiController::class)->except('show', 'create', 'edit');
    Route::resource('/galeri', GaleriController::class)->except('show', 'create', 'edit');
    Route::resource('/harga', HargaController::class)->except('show', 'create', 'edit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
