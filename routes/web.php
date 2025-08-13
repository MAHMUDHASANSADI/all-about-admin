<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
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
    //permission route
    Route::get('/permission/index', [PermissionController::class, 'index'])->name('permission.index');
    Route::get('/permission/create', [PermissionController::class, 'create'])->name('permission.create');
    Route::get('/permission/{id}/edit', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::delete('/permission/{id}', [PermissionController::class, 'destroy'])->name('permission.destroy');
    Route::post('/permission', [PermissionController::class, 'store'])->name('permission.store');
    Route::post('/permission/{id}', [PermissionController::class, 'update'])->name('permission.update');
    //role route
    Route::get('/role/index', [RoleController::class, 'index'])->name('role.index');
    Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
    Route::get('/role/{id}/edit', [RoleController::class, 'edit'])->name('role.edit');
    Route::delete('/role/{id}', [RoleController::class, 'destroy'])->name('role.destroy');
    Route::post('/role', [RoleController::class, 'store'])->name('role.store');
    Route::post('/role/{id}', [RoleController::class, 'update'])->name('role.update');
    //article route
    Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
    Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
    Route::get('/article/{id}/edit', [ArticleController::class, 'edit'])->name('article.edit');
    Route::delete('/article/{id}', [ArticleController::class, 'destroy'])->name('article.destroy');
    Route::post('/article', [ArticleController::class, 'store'])->name('article.store');
    Route::post('/article/{id}', [ArticleController::class, 'update'])->name('article.update');


});

Route::prefix('admin')->middleware('auth:admin')->group(function () {
   Route::get('category/index',function(){
       return view('admin.category.index');
   });
});


require __DIR__.'/auth.php';
require __DIR__.'/admin-auth.php';
