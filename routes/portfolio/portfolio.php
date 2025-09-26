<?php

Route::prefix('/portfolio')->group(function () {
    Route::middleware(['auth','verified'])->group(function () {
        Route::get('/list', App\Livewire\LivewireCreatePortfolioStepOne::class)->name('portfolio.list');

        Route::prefix('/edit')->group(function(){
            Route::get('/{id}', App\Livewire\LivewireEditPortfolioStepOne::class)->name('portfolio.edit');
            Route::get('/step-two/{id}', App\Livewire\LivewireEditPortfolioStepTwo::class)->name('portfolio.step-two.edit');
            Route::get('/step-three/{id}', App\Livewire\LivewireEditPortfolioStepThree::class)->name('portfolio.step-three.edit');
        });
    });

    Route::get('/', [App\Http\Controllers\PortfolioController::class, 'homePage'])->name('portfolio');
});

Route::get('/{url}', [App\Http\Controllers\PortfolioController::class, 'show'])->name('portfolio.live');