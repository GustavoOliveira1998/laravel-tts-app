<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TtsController;

Route::get('/', [TtsController::class, 'index']);
Route::post('/generate', [TtsController::class, 'generate'])->name('tts.generate');
