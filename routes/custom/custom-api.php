<?php

use App\Http\Controllers\Zeus\TicketController;


Route::prefix('support-tickets')->group(function() {
    Route::get('/departments', [TicketController::class, 'departments'])->name('tickets.departments');
    Route::get('/departments/{department}/tickets', [TicketController::class, 'index'])->name('tickets.index');
    Route::get('/{ticket}', [TicketController::class, 'show'])->name('tickets.show');;
    Route::patch('/{ticket}', [TicketController::class, 'update'])->name('tickets.update');;
    Route::post('/{ticket}/message', [TicketController::class, 'message'])->name('tickets.message');
});