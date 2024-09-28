<?php

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\PostsController;
use App\Http\Controllers\Dashboard\AdminUsersController;
use App\Http\Controllers\Dashboard\AdminCategoryController;
use App\Http\Controllers\Dashboard\AdminFeaturedPostsController;
use App\Http\Controllers\Dashboard\DashboardPostController;

//HOME
route::get('/', [HomeController::class, 'index'])->name('home');

//posts
Route::get('/posts', [PostsController::class, 'index']);
Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', ['title' => count($category->posts) . ' Article in ' . $category->name, 'posts' => $category->posts]);
});

//login
Route::get('/admin', [LoginController::class, 'index'])->name('login')->middleware('guest');
// Route::post('/admin',[LoginController::class, 'store']); 
    // adding new user
Route::post('/admin', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

//DASHBOARD
Route::get('/dashboard', function () {
    return view('dashboard.index', [
        'title' => 'Admin Dashboard'
    ]);
})->name('dashboard')->middleware('auth');

//dashboard posts
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);
    Route::resource('/posts', DashboardPostController::class);
});
// Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
// Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

//admin users
Route::resource('/dashboard/users', AdminUsersController::class)->except('show')->middleware('admin');

// manage post
Route::group(['prefix' => 'dashboard/manage-posts', 'middleware' => 'admin'], function () {
    Route::get('/categories/checkSlug', [AdminCategoryController::class, 'checkSlug']);
    Route::resource('/categories', AdminCategoryController::class)->except('show');
    Route::get('/featured', [AdminFeaturedPostsController::class, 'index'])->name('featured');
    Route::patch('/featured/{post}/pin', [AdminFeaturedPostsController::class, 'pin'])->name('pin');
    Route::patch('/featured/{post}/unpin', [AdminFeaturedPostsController::class, 'unpin'])->name('unpin');
});


// Route::resource('/dashboard/manage-posts/categories', AdminCategoryController::class)->except('show')->middleware('admin');
// Route::get('/dashboard/manage-posts/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('admin');
// Route::get('/dashboard/manage-posts/featured', [AdminFeaturedPostsController::class, 'index'])->middleware('auth');
