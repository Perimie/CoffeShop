<?php

use App\Http\Controllers\AdminContoller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'loginPage']);

//Route::get('/', [HomeController::class, 'index']);
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
route::get('dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


route::get('admin/dashboard', [AdminContoller::class, 'index'])->middleware(['auth','admin']);


route::get('/home', [AdminContoller::class, 'home'])->middleware(['auth','admin'])->name('home');

route::get('/category', [AdminContoller::class, 'category'])->middleware(['auth','admin'])->name('category');

route::post('add_category', [AdminContoller::class, 'add_category'])->middleware(['auth','admin']);