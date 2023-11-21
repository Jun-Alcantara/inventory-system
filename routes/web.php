<?php

use Illuminate\Support\Facades\Route;

/*** !! NOTE: Namespace App\Http\Controllers is added in RouteServiceProvider */

Route::group(['middleware' => ['auth', 'web']], function () {
    Route::get('/', ShowDashboard::class)->name('dashboard.index');

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', \User\ShowUsers::class)->name('users.index');
        Route::get('create', \User\ShowCreateUserForm::class)->name('users.create');
        Route::post('store', \User\StoreUserDetails::class)->name('users.store');
        Route::get('{user}/edit', \User\ShowEditUserForm::class)->name('users.edit');
        Route::patch('{user}/update', \User\UpdateUserDetails::class)->name('users.update');
        Route::post('{user}/destroy', \User\DeleteUser::class)->name('users.destroy');
    });
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('login', \User\ShowLoginForm::class)
        ->name('login');

    Route::post('login', \User\AuthenticateUser::class)
        ->name('login.attempt');
});