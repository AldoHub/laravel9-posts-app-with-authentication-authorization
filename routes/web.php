<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

//user
Route::get("register", [UserController::class, 'create'])->middleware('guest');
Route::post("/users", [UserController::class, 'store']);
Route::post("/logout", [UserController::class, 'logout'])->middleware('auth');
Route::get("/login", [UserController::class, 'login'])->name("login")->middleware('guest');;
Route::post("/users/authenticate", [UserController::class, 'authenticate']);




//posts
Route::get('/', [PostController::class, 'index']);
Route::get("/posts/manage", [PostController::class, 'manage'])->middleware('auth');
Route::get("/posts/create", [PostController::class, 'create'])->middleware('auth');
Route::post("/posts", [PostController::class, 'store']);
Route::get("/posts/{post}", [PostController::class, 'show']);
Route::put("/posts/edit/{post}", [PostController::class, 'update'])->middleware('auth');
Route::delete("/posts/delete/{post}", [PostController::class, 'destroy'])->middleware('auth');




