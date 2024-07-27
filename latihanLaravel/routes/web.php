<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\ProfilController;
use Illuminate\View\View;
use Illuminate\Http\Request;
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

// Route::get('/', [PostController::class, 'index']);
// // Route untuk resource post
// Route::resource('/posts', PostController::class);

//Route::get('/view{code}', [PostController::class, 'view'])->name('posts.view');
//Route::get('/add', [PostController::class, 'add'])->name('posts.add');
//Route::get('/edit{code}', [PostController::class, 'edit'])->name('posts.edit');
//Route::get('/login', [PostController::class, 'login'])->name('posts.login');
//Route::get('/pdf', [PostController::class, 'generatePDF'])->name('posts.pdf');


Route::middleware('auth')->group(function(){
    Route::get('/', [PostController::class, "index"])->name("home");
    Route::get('/home', [PostController::class, "index"])->name("home");
    Route::post('/logout', [PostController::class, "logout"])->name("logout");
    Route::resource('/posts', PostController::class);
    Route::get('/view{code}', [PostController::class, 'view'])->name('posts.view');
    Route::get('/add', [PostController::class, 'add'])->name('posts.add');
    Route::get('/edit{code}', [PostController::class, 'edit'])->name('posts.edit');
    Route::get('/login', [PostController::class, 'login'])->name('posts.login');
    Route::get('/pdf', [PostController::class, 'generatePDF'])->name('posts.pdf');
});

Route::middleware('guest')->group(function(){
    Route::get('/register', [PostController::class, 'registerForm'])->name("profile.register");
    Route::posts('/register', [PostController::class, 'register'])->name("profile.register");
    Route::get('/login', [PostController::class, 'loginForm'])->name("login");
    Route::get('/login', [PostController::class, 'login'])->name("login");

});



