<?php

use App\Http\Controllers\Zeus\TicketController;

Route::get('support-tickets', [TicketController::class, 'page'])->name('tickets.index');