<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VideoController;

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


Route::get('/', [UserController::class, 'home'])->name('home');
Route::get('/', [VideoController::class, 'listVideo'])->name('management');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::get('/trending', [UserController::class, 'trending'])->name('trending');
Route::get('/library/{id}', [UserController::class, 'library'])->name('library');
Route::get('/newcd', [UserController::class, 'newcd'])->name('newcd');
Route::get('/category', [UserController::class, 'category'])->name('category');
Route::get('/cart', [UserController::class, 'cart'])->name('cart');
Route::get('/ticketUsd', [UserController::class, 'ticketUsd'])->name('ticketUsd');

Route::post('/usdPlus', [UserController::class, 'usdPlus'])->name('usdPlus');
Route::post('/ticketPlus', [UserController::class, 'ticketPlus'])->name('ticketPlus');

Route::get('/admin', [UserController::class,'admin'])->name('admin');
Route::get('/admin', [VideoController::class, 'listVideoadmin'])->name('managementadmin');

Route::get('/add', [UserController::class,'add'])->name('add');

Route::get('/', [VideoController::class, 'listVideo'])->name('add2');

Route::get('/edit/{id}',[UserController::class,'edit'])->name('edit');
Route::get('/play_song/{id}',[VideoController::class,'play_song'])->name('play_song');
Route::get('/play_songa/{id}',[VideoController::class,'play_songa'])->name('play_songa');
Route::get('/video_delete/{id}',[VideoController::class,'video_delete'])->name('video_delete');
Route::get('/delSongCart/{id}',[UserController::class,'delSongCart'])->name('delSongCart');
Route::get('/backsong/{id}',[VideoController::class,'backsong'])->name('backsong');
Route::get('/nextsong/{id}',[VideoController::class,'nextsong'])->name('nextsong');



Route::get('/add_library/{id}', [UserController::class, 'add_library'])->name('add_library');
Route::get('/add_cart/{id}', [UserController::class, 'add_cart'])->name('add_cart');

Route::get('/playlist/{library_name}', [UserController::class, 'playlist'])->name('playlist');
Route::get('/trending_song/{id}', [VideoController::class, 'trending_song'])->name('trending_song');
Route::get('/newcd_song/{id}', [VideoController::class, 'newcd_song'])->name('newcd_song');
Route::get('/cate_song/{id}', [VideoController::class, 'cate_song'])->name('cate_song');
Route::get('/playlist_song/{id}', [VideoController::class, 'playlist_song'])->name('playlist_song');

Route::get('/mana_admin', [UserController::class, 'mana_admin'])->name('mana_admin');
Route::get('/mana_user', [UserController::class, 'mana_user'])->name('mana_user');
Route::get('/add_admin', [UserController::class, 'add_admin'])->name('add_admin');
Route::get('/user_delete/{id}',[UserController::class,'user_delete'])->name('user_delete');
Route::get('/user_edit/{id}', [UserController::class, 'user_edit'])->name('user_edit');




Route::post('/login',[UserController::class,'auth_login'])->name('auth.login');
Route::post('/register',[UserController::class,'auth_register'])->name('auth.register');
Route::post('/',[UserController::class, 'logout'])->name('logout');

Route::post('/add', [VideoController::class, 'add_video'])->name('add_video');
Route::post('/video_edit/{id}',[VideoController::class,'video_edit'])->name('video_edit');
Route::post('/add_admin_auth',[UserController::class,'add_admin_auth'])->name('add_admin_auth');
Route::post('/user_edit_auth',[UserController::class,'user_edit_auth'])->name('user_edit_auth');
Route::post('/delSongLib',[UserController::class,'delSongLib'])->name('delSongLib');


Route::post('/searchvid',[VideoController::class, 'searchvideo'])->name('searchvid');
Route::post('/searchvidad',[VideoController::class, 'searchvideoad'])->name('searchvidad');







