<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Fitness\StrengthController;
use App\Http\Controllers\Fitness\RunController;

Route::get('/', fn() => view('home'));
Route::get('/', fn() => view('home'))->name('home');

Route::get('/massimale', [StrengthController::class, 'index'])
    ->name('strength.index');

Route::get('/forza-media', [StrengthController::class, 'forzaMedia'])
    ->name('strength.forza_media');

Route::post('/massimale/standard', [StrengthController::class, 'calculateStandard'])
    ->name('strength.standard');

Route::post('/massimale/dip', [StrengthController::class, 'calculateDip'])
    ->name('strength.dip');

Route::get('/run', [RunController::class, 'index'])
    ->name('run.index');

Route::post('/run', [RunController::class, 'calculate'])
    ->name('run.calculate');
