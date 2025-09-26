<?php

use App\Http\Controllers\AgencyController;
use Illuminate\Support\Facades\Route;
use App\Livewire\LivewireEditAgency;
use App\Livewire\LivewireAgencyController;

Route::prefix('/laravel-consultants')->group(function () {
    Route::middleware(['auth','verified'])->group(function () {
        Route::get('/list', [AgencyController::class, 'index'])->name('agency.list');
        Route::get('/update/{id?}', LivewireEditAgency::class)->name('agency.update');
    });

    Route::get('/all', LivewireAgencyController::class)->name('agency.all');
    Route::get('/all/{agency}',[AgencyController::class,'show'])->name('agency.show');
});
