<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/phpinfo', function () {
    return phpinfo();
});

Route::get('/home', function () {
    return 'Hello World';
});

Route::get('/dashboard', function () {
    for($i=1; $i<=10; $i++){
        echo $i;
    }
});

// Route::get('/user', [UserController::class, 'index']);
// Route::get('/user/create', [UserController::class, 'create']);
// Route::post('/user/store', [UserController::class, 'store']);
// Route::get('/user/{id}/edit', [UserController::class, 'edit']);
// Route::put('users/{id}/update',[UserController::class, 'update']);
// Route::delete('/user/{id}', [UserController::class, 'delete']);

Route::group(['prefix' => 'user'], function() {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/{id}/update',[UserController::class, 'update'])->name('user.update');
    Route::delete('/{id}', [UserController::class, 'delete'])->name('user.delete');
});