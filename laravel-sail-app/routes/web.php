<?php

use App\Http\Controllers\Api\Users\V1\UserController as v1User;
use App\Http\Controllers\Api\Users\V2\UserController as v2User;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::GET('/', function () {
    return view('top');
});

Route::prefix('users/v1/userInfo')->group( function () {
    Route::GET('{id}', [v1User::class, 'read'])->name('v1User.read');
    Route::POST('/', [v1User::class, 'create'])->name('v1User.create');
    Route::PUT('{id}', [v1User::class, 'update'])->name('v1User.update');
    Route::DELETE('{id}', [v1User::class, 'delete'])->name('v1User.delete');
});

Route::prefix('users/v2')->group( function () {
    Route::GET('getUserInfo/{id}', [v2User::class, 'read'])->name('v2User.read');
    Route::POST('createUserInfo', [v2User::class, 'create'])->name('v2User.create');
    Route::POST('updateUserInfo/{id}', [v2User::class, 'update'])->name('v2User.update');
    Route::POST('deleteUserInfo/{id}', [v2User::class, 'delete'])->name('v2User.delete');
});