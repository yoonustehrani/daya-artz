<?php

use App\Http\Controllers\Api\FormsController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\TelegramHookController;
use App\Http\Controllers\Api\UserArea\InvoiceController;
use App\Http\Controllers\Api\UserArea\OrderController;
use App\Http\Controllers\Api\UserArea\OrderItemController;
use App\Http\Controllers\Api\UserArea\ReportController;
use App\Http\Controllers\Api\UserArea\TicketController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\VerificationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Ramsey\Uuid\Uuid;

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
    // Tickets
    Route::get('tickets', [TicketController::class, 'index'])->name('tickets.index');
    Route::post('tickets/', [TicketController::class, 'store'])->name('tickets.store');
    Route::get('tickets/departments', [TicketController::class, 'departments'])->name('tickets.departments.index');
    Route::get('tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show');
    Route::put('tickets/{ticket}', [TicketController::class, 'update'])->name('tickets.update');
    Route::get('transactions', [ReportController::class, 'transactions'])->name('transactions.index');
    // Invoices
    Route::get('invoices', [InvoiceController::class, 'index'])->name('invoices.index');
    Route::get('invoices/{invoice}', [InvoiceController::class, 'show'])->name('invoices.show');
    Route::post('invoices/{invoice}/activate', [InvoiceController::class, 'update'])->name('invoices.update');
    // Orders
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('orders/{order}/items/{item_id}', [OrderItemController::class, 'show'])->name('order_items.show');
    Route::get('orders/{order}/items/{item_id}/tickets', [OrderItemController::class, 'tickets'])->name('order_items.tickets.index');
    // Bills and Offers
    Route::post('bills/{bill}/pay/{method}', [PaymentController::class, 'store'])->name('bills.pay');
    Route::get('offers', [ReportController::class, 'offers'])->name('offers.index');
    // Statistics
    Route::prefix('stats')->name('stats.')->group(function() {
        Route::get('general', [ReportController::class, 'general'])->name('general');
        Route::get('orders', [ReportController::class, 'ordersStat'])->name('orders');
        Route::get('latest', [ReportController::class, 'latest'])->name('latest');
    });
    // User data
    Route::prefix('user')->group(function() {
        Route::put('auth', [UserController::class, 'update']);
        Route::put('customer', [UserController::class, 'updateInfo']);
        Route::put('company', [UserController::class, 'updateCompany']);
    });
});

\ZeusPanel::api_routes();

try {
    $bot_token = config('services.telegram_bots.dayaartz.token');
    $tg_route_id = Uuid::uuid4();
    $path = "telegram/{$tg_route_id}/bot/{$bot_token}";
    Route::post($path, [TelegramHookController::class, 'handle'])->name('telegram.bot.handle');
    set_telegram_webhook($bot_token, $path);
} catch (\Throwable $th) {
    \Log::error('error setting webhook');
}
