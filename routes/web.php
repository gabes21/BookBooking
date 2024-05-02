<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BookUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// All Books
Route::get('/', [BookController::class, 'index'])->name('home');

// Single Book
Route::get('/books/{book}', [BookController::class, 'show'])->middleware('check.booked');

// Show Register Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest.message');

// Create New User
Route::post('/users', [UserController::class, 'store'])->middleware('guest.message');

// Log Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth.message');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest.message');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate'] )->middleware('guest.message');

// Make a Booking
Route::post('/books/{book}/store', [BookUserController::class, 'store'])->middleware('auth.message');

// Manage Booking
Route::get('/manage', [BookUserController::class, 'manage'])->middleware('auth.message');

// Delete Booking
Route::delete('/books/{book}', [BookUserController::class, 'destroy'])->middleware('check.booked');