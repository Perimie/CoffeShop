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



//products routing (coffees)
route::get('products', [AdminController::class, 'products'])->middleware(['auth','admin'])->name('products');

route::post('add_product', [AdminController::class, 'add_product'])->middleware(['auth','admin']);

route::post('update_coffee/{id}', [AdminController::class, 'update_coffee'])->middleware(['auth','admin']);

Route::get('delete_coffee/{id}', [AdminController::class, 'delete_coffee'])->middleware(['auth', 'admin']);


//snacks routing
route::get('snacks', [AdminController::class, 'snacks'])->middleware(['auth','admin'])->name('snacks');

route::post('add_snacks', [AdminController::class, 'add_snacks'])->middleware(['auth','admin']);

route::post('update_snack/{id}', [AdminController::class, 'update_snack'])->middleware(['auth','admin']);

Route::get('delete_snack/{id}', [AdminController::class, 'delete_snack'])->middleware(['auth', 'admin']);

//end of admin routes 



//Start Home routes

route::get('coffee_page',[HomeController::class, 'coffeePage'])->middleware(['auth', 'verified']);


route::get('snack_page',[HomeController::class, 'snackPage'])->middleware(['auth', 'verified']);

//end of Home routes