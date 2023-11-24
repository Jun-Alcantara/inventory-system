<?php

use Illuminate\Support\Facades\Route;

/*** !! NOTE: Namespace App\Http\Controllers is added in RouteServiceProvider */

Route::group(['middleware' => ['auth', 'web']], function () {
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', \User\ShowUsers::class)->name('users.index');
        Route::get('create', \User\ShowCreateUserForm::class)->name('users.create');
        Route::post('store', \User\StoreUserDetails::class)->name('users.store');
        Route::get('{user}/edit', \User\ShowEditUserForm::class)->name('users.edit');
        Route::patch('{user}/update', \User\UpdateUserDetails::class)->name('users.update');
        Route::post('{user}/destroy', \User\DeleteUser::class)->name('users.destroy');
    });

    Route::group(['prefix' => 'equipments'], function () {
        Route::get('/', \Equipments\ShowEquipments::class)->name('equipments.index');
        Route::get('create', \Equipments\ShowCreateEquipmentForm::class)->name('equipments.create');
        Route::post('store', \Equipments\SaveEquipmentDetails::class)->name('equipments.store');
        Route::get('{equipment}/edit', \Equipments\ShowEditEquipmentForm::class)->name('equipments.edit');
        Route::patch('{equipment}/edit', \Equipments\UpdateEquipmentDetails::class)->name('equipments.update');
        Route::delete('{equipment}/delete', \Equipments\DeleteEquipment::class)->name('equipments.destroy');
    });

    Route::group(['prefix' => 'logs'], function () {
        Route::get('/', \Logs\ShowLogs::class)->name('logs.index');
    });
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('login', \User\ShowLoginForm::class)
        ->name('login');

    Route::post('login', \User\AuthenticateUser::class)
        ->name('login.attempt');
});