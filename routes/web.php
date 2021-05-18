<?php

use Illuminate\Support\Facades\App;
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

Route::name('front.')->group(function () {
    Route::get('/', \App\Http\Livewire\Front\Index::class)->name('index');

    Route::get('article/{article:slug}', \App\Http\Livewire\Front\Article\Show::class)->name('article.show');

    Route::get('tag/{tag:slug}', \App\Http\Livewire\Front\Tag\Show::class)->name('tag.show');

    Route::get('profile/{user:username}', \App\Http\Livewire\Front\User\Show::class)->name('user.show');
});

Route::post('logout', \App\Http\Controllers\Auth\LogoutCurrentSession::class)
    ->middleware(['auth'])
    ->name('logout');

Route::prefix('app')
    ->name('app.')
    ->group(function () {
        Route::get('login', \App\Http\Livewire\App\Login::class)
            ->middleware(['guest'])
            ->name('login');

        Route::get('register', \App\Http\Livewire\App\Register::class)
            ->middleware(['guest'])
            ->name('register');

        Route::get('settings', \App\Http\Livewire\App\Setting::class)->name('setting');

        Route::name('article.')->group(function () {
            Route::get('create', \App\Http\Livewire\App\Article\Create::class)->name('create');

            Route::get('edit/{article}', \App\Http\Livewire\App\Article\Edit::class)->name('edit');
        });
    });
