<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SubscribeController;
use App\Http\Middleware\AuthMiddleware;
use App\Mail\WelcomeEmail;
use App\Models\Category;
use App\Models\Comment;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware(AuthMiddleware::class)->group(function () {
    
Route::get('/', [BlogController::class,'index']);

Route::middleware('auth-admin')->group(function(){

Route::get('/admin', [AdminController::class,'index'])->name('admin.dashboard');
Route::get('/admin/create', [AdminController::class,'create']);
Route::post('/admin/store', [AdminController::class,'store']);
Route::get('/admin/blogs/{blog:slug}/edit', [AdminController::class,'edit']);
Route::delete('/admin/blogs/{blog:slug}/destory', [AdminController::class,'destory']);
Route::patch('/admin/blogs/{blog:slug}/update', [AdminController::class,'update']);

});

Route::get('/blogs/{blog:slug}', [BlogController::class,'show']);
Route::post('/logout', [AuthController::class,'logout']);
Route::post('/blogs/{blog:slug}/comments', [CommentController::class,'store']);
Route::post('/blogs/{blog:slug}/toggle-subscribe', [SubscribeController::class,'toggle'])->name('blogs.toggle');
Route::get('/comment/edit/{comment}', [CommentController::class,'edit'])->middleware('can:edit,comment');
Route::put('/comment/update/{comment}', [CommentController::class,'update'])->middleware('can:edit,comment');
Route::get('/comment/edit/{comment}', [CommentController::class,'edit'])->middleware('can:edit,comment');
Route::delete('/comment/delete/{comment}', [CommentController::class,'destory'])->middleware('can:delete,comment');

});

Route::middleware('guest')->group(function () {
Route::get('/register', [AuthController::class,'create']);
Route::post('/register', [AuthController::class,'store']);
Route::post('/login', [AuthController::class,'loginStore']);
Route::get('/login', [AuthController::class,'login']);

});
