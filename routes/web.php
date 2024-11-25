<?php

use App\Http\Controllers\AdminController;
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

//start of admin routes 
route::get('admin/dashboard', [AdminController::class, 'index'])->middleware(['auth','admin']);

//home Routing
route::get('/home', [AdminController::class, 'home'])->middleware(['auth','admin'])->name('home');

// category routing
route::get('/category', [AdminController::class, 'category'])->middleware(['auth','admin'])->name('category');

route::post('add_category', [AdminController::class, 'add_category'])->middleware(['auth','admin']);

route::post('edit_category/{id}', [AdminController::class, 'edit_category'])->middleware(['auth','admin']);

route::get('delete_category/{id}', [AdminController::class, 'delete_category'])->middleware(['auth','admin']);

//products routing
route::get('products', [AdminController::class, 'products'])->middleware(['auth','admin'])->name('products');

route::post('add_product', [AdminController::class, 'add_product'])->middleware(['auth','admin']);

//end of admin routes 