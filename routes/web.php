<?php

use App\Http\Controllers\PortalController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MainmenuController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PortalController::class, 'index']);
Route::get('about', [PortalController::class, 'about']);
Route::get('contact', [PortalController::class, 'contact']);
Route::get('news', [PortalController::class, 'post']);
Route::get('news/{id}/{slug}', [PortalController::class, 'postDetail']);
Route::get('menu/{id}', [PortalController::class, 'menu']);
Route::get('news/{id}', [PortalController::class, 'category']);
Route::get('search', [PortalController::class, 'search']);

// Route Akses Admin
Route::get('register', [AdminController::class, 'register']);
Route::post('register', [AdminController::class, 'postRegister']);
Route::get('login', [AdminController::class, 'login']);
Route::post('login', [AdminController::class, 'postLogin']);
Route::get('logout', [AdminController::class, 'logout']);

Route::prefix('comment')->group(function () {
    Route::post('/', [CommentController::class, 'insert']);
});

Route::prefix('contact')->group(function () {
    Route::post('/', [MessageController::class, 'insert']);
});

// Route Menu Admin
Route::middleware('checkAdmin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index']);

        Route::prefix('category')->group(function () {
            Route::get('/', [CategoryController::class, 'index']);
            Route::get('create', [CategoryController::class, 'create']);
            Route::post('create', [CategoryController::class, 'insert']);
            Route::get('edit/{id}', [CategoryController::class, 'edit']);
            Route::post('edit/{id}', [CategoryController::class, 'update']);
            Route::get('delete/{id}', [CategoryController::class, 'delete']);
        });

        Route::prefix('post')->group(function () {
            Route::get('/', [PostController::class, 'index']);
            Route::get('create', [PostController::class, 'create']);
            Route::post('create', [PostController::class, 'insert']);
            Route::get('edit/{id}', [PostController::class, 'edit']);
            Route::post('edit/{id}', [PostController::class, 'update']);
            Route::get('delete/{id}', [PostController::class, 'delete']);
        });

        Route::prefix('slider')->group(function () {
            Route::get('/', [SliderController::class, 'index']);
            Route::get('create', [SliderController::class, 'create']);
            Route::post('create', [SliderController::class, 'insert']);
            Route::get('edit/{id}', [SliderController::class, 'edit']);
            Route::post('edit/{id}', [SliderController::class, 'update']);
            Route::get('delete/{id}', [SliderController::class, 'delete']);
        });

        Route::prefix('mainmenu')->group(function () {
            Route::get('/', [MainmenuController::class, 'index']);
            Route::get('create', [MainmenuController::class, 'create']);
            Route::post('create', [MainmenuController::class, 'insert']);
            Route::get('edit/{id}', [MainmenuController::class, 'edit']);
            Route::post('edit/{id}', [MainmenuController::class, 'update']);
            Route::get('delete/{id}', [MainmenuController::class, 'delete']);
        });

        Route::prefix('message')->group(function () {
            Route::get('/', [MessageController::class, 'index']);
        });

        Route::prefix('user')->group(function () {
            Route::get('/', [UserController::class, 'index']);
            Route::get('create', [UserController::class, 'create']);
            Route::post('create', [UserController::class, 'postRegister']);
            Route::get('edit/{id}', [UserController::class, 'edit']);
            Route::post('edit/{id}', [UserController::class, 'update']);
            Route::get('delete/{id}', [UserController::class, 'delete']);
        });

        Route::prefix('profile')->group(function () {
            Route::get('{id}', [AdminController::class, 'edit']);
            Route::post('{id}', [AdminController::class, 'update']);
        });

    });
    Route::prefix('author')->group(function () {
        Route::get('/', [AdminController::class, 'index2']);

        Route::prefix('category')->group(function () {
            Route::get('/', [CategoryController::class, 'index2']);
            Route::get('create', [CategoryController::class, 'create2']);
            Route::post('create', [CategoryController::class, 'insert2']);
            Route::get('edit/{id}', [CategoryController::class, 'edit2']);
            Route::post('edit/{id}', [CategoryController::class, 'update2']);
            Route::get('delete/{id}', [CategoryController::class, 'delete2']);
        });

        Route::prefix('post')->group(function () {
            Route::get('/', [PostController::class, 'index2']);
            Route::get('create', [PostController::class, 'create2']);
            Route::post('create', [PostController::class, 'insert2']);
            Route::get('edit/{id}', [PostController::class, 'edit2']);
            Route::post('edit/{id}', [PostController::class, 'update2']);
            Route::get('delete/{id}', [PostController::class, 'delete2']);
        });

        Route::prefix('profile')->group(function () {
            Route::get('{id}', [AdminController::class, 'edit2']);
            Route::post('{id}', [AdminController::class, 'update2']);
        });

    });
});