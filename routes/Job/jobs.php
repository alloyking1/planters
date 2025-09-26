<?php

use App\Http\Controllers\AgencyController;
use Illuminate\Support\Facades\Route;
use App\Livewire\LivewireCreateJob;
use App\Livewire\LivewireEditJob;
use App\Livewire\LivewireJobController;

Route::prefix('/jobs')->group(function () {
    Route::middleware(['auth','verified'])->group(function () {
        Route::get('/list', LivewireCreateJob::class)->name('jobs.list');
        Route::get('/update/{id?}', LivewireEditJob::class)->name('jobs.update');
    });

    Route::get('/all', LivewireJobController::class)->name('jobs.all');
});
