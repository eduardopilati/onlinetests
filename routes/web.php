<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('setup')->name('setup')->group(function(){
    Route::get('', [ App\Http\Controllers\SetupController::class, 'index'])->name('');
    Route::post('saveuser', [ App\Http\Controllers\SetupController::class, 'saveuser'])->name('.saveuser');
    Route::post('saveusergroup', [ App\Http\Controllers\SetupController::class, 'saveusergroup'])->name('.saveusergroup');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::prefix('users')->name('users')->group(function(){
        Route::get('', [ App\Http\Controllers\UserController::class, 'index'])->name('');
        Route::get('create/', [ App\Http\Controllers\UserController::class, 'create'])->name('.create');
        Route::get('edit/{id}', [ App\Http\Controllers\UserController::class, 'edit'])->name('.edit');
        Route::post('save', [ App\Http\Controllers\UserController::class, 'save'])->name('.save');
        Route::post('update/{id}', [ App\Http\Controllers\UserController::class, 'update'])->name('.update');
        Route::get('sendemail/{id}', [ App\Http\Controllers\UserController::class, 'sendPasswordEmail'])->name('.sendemail');
        Route::get('usergroups/{id}', [ App\Http\Controllers\UserController::class, 'userGroups'])->name('.usergroups');
        Route::post('linkusergroup/{id}', [ App\Http\Controllers\UserController::class, 'linkUserGroup'])->name('.linkusergroup');
        Route::post('unlinkusergroup/{id}', [ App\Http\Controllers\UserController::class, 'unlinkUserGroup'])->name('.unlinkusergroup');
    });

    Route::prefix('usergroups')->name('usergroups')->group(function(){
        Route::get('', [ App\Http\Controllers\UserGroupController::class, 'index'])->name('');
        Route::get('create/', [ App\Http\Controllers\UserGroupController::class, 'create'])->name('.create');
        Route::get('edit/{id}', [ App\Http\Controllers\UserGroupController::class, 'edit'])->name('.edit');
        Route::post('save', [ App\Http\Controllers\UserGroupController::class, 'save'])->name('.save');
        Route::post('update/{id}', [ App\Http\Controllers\UserGroupController::class, 'update'])->name('.update');
    });
});
