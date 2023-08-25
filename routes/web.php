<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('principal');
});



Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

//Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

//Profile edit
Route::get("/edit-profile", [ProfileController::class, 'index'])->name('profile.index');
Route::post("/edit-profile", [ProfileController::class, 'store'])->name('profile.store');

//Posts
Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts',[PostController::class,'store'])->name('posts.store');
Route::get('/{user:username}/posts/{post}',[PostController::class, 'show'])->name('posts.show');

//ImagePost
//Route::post('/imagenes',[ImageController::class,'store'])->name('imagenes.store');
Route::post('/imagenes', [ImageController::class, 'store'])->name('imagenes.store');

//Comments
Route::post('/{user:username}/posts/{post}', [CommentController::class, 'store'])->name('comments.store');
Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

//Likes
Route::post('/posts/{post}/like', [LikeController::class, 'store'])->name('posts.likes.store');
Route::delete('/posts/{post}/like', [LikeController::class, 'destroy'])->name('posts.likes.destroy');



