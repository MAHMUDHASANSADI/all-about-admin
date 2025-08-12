<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user-page', function () {
    return view('user-page');
})->middleware('is_admin');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/permission/index', [PermissionController::class, 'index'])->name('permission.index');
    Route::get('/permission/create', [PermissionController::class, 'create'])->name('permission.create');
    Route::get('/permission/edit', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::get('/permission/delete', [PermissionController::class, 'create'])->name('permission.destroy');
    Route::post('/permission', [PermissionController::class, 'store'])->name('permission.store');
});

Route::prefix('admin')->middleware('auth:admin')->group(function () {
   Route::get('category/index',function(){
       return view('admin.category.index');
   });
});


require __DIR__.'/auth.php';
require __DIR__.'/admin-auth.php';
