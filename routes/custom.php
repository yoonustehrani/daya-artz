<?php

Route::get('support-tickets', function() {
    return view('custom.tickets');
})->name('tickets.index');