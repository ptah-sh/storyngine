<?php

use App\Http\Controllers\StoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StoryController::class, 'index']);
Route::get('/stories/{story}', [StoryController::class, 'show'])->name('stories.show');
