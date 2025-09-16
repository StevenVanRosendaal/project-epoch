<?php

use App\Http\Controllers\PageController;
use App\Livewire\Game\OutpostDashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('page.home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/game', OutpostDashboard::class)->name('game.dashboard');
});
