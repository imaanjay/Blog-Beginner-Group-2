<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

Route::get('/', [HomeController::class, 'index'])->name('dashboard');

Route::get('/about-us', function () {
    return view('aboutUs');
})->name('about-us');

Route::get('/post/detail/{slug}', [PostsController::class, 'show'])->name('post');
Route::get('/categories/posts/{category:slug}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/tags/posts/{tag:slug}', [TagController::class, 'show'])->name('tags.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/posts', [PostsController::class, 'index'])->name('posts');

    Route::prefix('post')->group(function () {
        Route::get('/create', [PostsController::class, 'create'])->name('post.create');
        Route::get('/checkSlug', [PostsController::class, 'checkSlug'])->name('post.slug');
        Route::post('/store', [PostsController::class, 'store'])->name('post.store');
        Route::delete('/{article:slug}/delete', [PostsController::class, 'destroy'])->name('post.delete');
        Route::get('/{article:slug}/edit', [PostsController::class, 'edit'])->name('post.edit');
        Route::put('/{article:slug}/update', [PostsController::class, 'update'])->name('post.update');
    });

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::prefix('category')->group(function () {
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::put('/{category}/update', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/{category:slug}/delete', [CategoryController::class, 'destroy'])->name('category.delete');
    });

    Route::get('/tags', [TagController::class, 'index'])->name('tags');
    Route::get('/get-tags', [TagController::class, 'getTag']);
    Route::prefix('tag')->group(function () {
        Route::post('/store', [TagController::class, 'store'])->name('tag.store');
        Route::put('/{tag}/update', [TagController::class, 'update'])->name('tag.update');
        Route::delete('/{tag:slug}/delete', [TagController::class, 'destroy'])->name('tag.delete');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
