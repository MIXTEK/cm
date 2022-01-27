<?php
use Illuminate\Support\Facades\Route;


Route::put('/users/{user}/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.profile.update');

Route::delete('/users/{user}/destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');


Route::middleware('role:admin')->group(function (){
    Route::get('/user/{user}/profile',[App\Http\Controllers\UserController::class, 'show'])->name('admin.users.profile');
//    Route::put('/user/{role}/attach',[App\Http\Controllers\UserController::class, 'attach'])->name('users.role.attach');
});



Route::middleware('can:view,user')->group(function (){
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('admin.users.index');

});
