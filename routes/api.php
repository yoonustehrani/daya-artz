<?php

use App\Customer;
use App\Http\Controllers\Api\FormsController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\UserArea\InvoiceController;
use App\Http\Controllers\Api\UserArea\OrderController;
use App\Http\Controllers\Api\UserArea\ReportController;
use App\Http\Controllers\Api\UserArea\TicketController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\VerificationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/', fn() => ['okay' => true]);

Route::prefix('forms')->name('forms.')->group(function() {
    Route::post('quick-order', [FormsController::class, 'quickOrder'])->name('orders.quick');
    Route::post('contact', [FormsController::class, 'contact'])->name('contact');
});

Route::get('posts', [PostController::class, 'indexApi'])->name('posts.index');
Route::get('portfolio/{service?}', [PortfolioController::class, 'index'])->name('portfolios.index');

/**
 * Auth Api routes
 */
Route::prefix('auth')->name('auth.')->group(function() {
    Route::post('login', [LoginController::class,'login'])->name('login'); // 
    Route::post('logout', [LoginController::class,'logout'])->name('logout')->middleware('auth:sanctum');
    Route::post('register', [RegisterController::class,'register'])->name('register');
    Route::get('user', [UserController::class, 'show'])->name('user')->middleware('auth:sanctum');
    Route::prefix('verification')->name('verification.')->middleware('auth:sanctum')->group(function() {
        Route::post('phone/verify', [VerificationController::class, 'verifyPhoneNumber'])->name('phone.verify');
        Route::put('phone/edit', [VerificationController::class, 'editPhoneNumber'])->name('phone.edit');
        Route::put('email/edit', [VerificationController::class, 'editEmail'])->name('email.edit');
        Route::post('phone/resend', [VerificationController::class, 'resendSmsCode'])->name('phone.resend');
        Route::post('email/resend', [VerificationController::class, 'resendEmail'])->name('email.resend');
    });
});
/**
 * Userarea Routes
 */
Route::prefix('userarea')->name('userarea.')->middleware('auth:sanctum')->group(function() {
    Route::get('tickets', [TicketController::class, 'index'])->name('tickets.index');
    Route::get('tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show');
    Route::put('tickets/{ticket}', [TicketController::class, 'update'])->name('tickets.update');
    Route::get('transactions', [ReportController::class, 'transactions'])->name('transactions.index');
    Route::get('offers', [ReportController::class, 'offers'])->name('offers.index');
    Route::get('invoices', [InvoiceController::class, 'index'])->name('invoices.index');
    Route::get('invoices/{invoice}', [InvoiceController::class, 'show'])->name('invoices.show');
    Route::get('orders', [OrderController::class, 'index']);
    Route::get('orders/{order}', [OrderController::class, 'show']);
    Route::post('bills/{bill}/pay/{method}', [PaymentController::class, 'store'])->name('bills.pay');
    Route::prefix('stats')->name('stats.')->group(function() {
        Route::get('general', [ReportController::class, 'general'])->name('general');
        // Route::get('orders', [ReportController::class, 'ordersStat']);
    });
    Route::prefix('user')->group(function() {
        Route::put('auth', [UserController::class, 'update']);
        Route::put('customer', [UserController::class, 'updateInfo']);
        Route::put('company', [UserController::class, 'updateCompany']);
    });
});

// 7808b50d-b0bf-4987-bc45-4978b935ad8b