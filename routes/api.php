<?php

use App\Customer;
use App\Http\Controllers\Api\FormsController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
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
});

Route::get('posts', [PostController::class, 'indexApi'])->name('posts.index');
Route::get('portfolio/{service?}', [PortfolioController::class, 'index'])->name('portfolios.index');

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
Route::prefix('userarea')->name('userarea.')->middleware('auth:sanctum')->group(function() {
    Route::get('tickets', [TicketController::class, 'index'])->name('tickets.index');
    Route::get('tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show');
    Route::put('tickets/{ticket}', [TicketController::class, 'update'])->name('tickets.update');
    Route::get('transactions', [ReportController::class, 'transactions'])->name('transactions.index');
    Route::get('offers', [ReportController::class, 'offers'])->name('offers.index');
    Route::get('invoices', [ReportController::class, 'invoices'])->name('invoices.index');
    Route::get('orders', [OrderController::class, 'index']);
    Route::get('orders/{order}', [OrderController::class, 'show']);
    Route::post('bills/{bill}/pay/{method}', [PaymentController::class, 'store'])->name('bills.pay');
    Route::prefix('user')->group(function() {
        Route::put('auth', [UserController::class, 'update']);
        Route::put('customer', [UserController::class, 'updateInfo']);
        Route::put('company', [UserController::class, 'updateCompany']);
        // Route::put('update', 'UserController@update');
        // Route::post('customer', function (Request $request) {
        //     \Gate::authorize('create', Customer::class);
        //     // $this->authorize('create', Customer::class);
        //     return ['okay' => true];
        //     // $request->validate([
        //     //     'firstname' => 'nullable|string|max:20|min:2',
        //     //     'lastname' => 'required|string|max:40|min:3',
        //     //     'phone_number' => 'required|string|regex:/^9[0-9]{9}$/'
        //     // ]);
        //     // $user = $request->user();
        //     // $customer = new Customer();
        //     // $customer->firstname = $request->firstname;
        //     // $customer->lastname = $request->lastname;
        //     // $customer->phone_number = $request->phone_number;
        //     // return [
        //     //     'okay' => $user->customer()->save($customer),
        //     //     'customer' => $customer->toArray()
        //     // ];
        // });
        // Route::put('customer/{customer}/edit', function (Request $request, $customer) {
        //     $user = $request->user();
        // });
    });
});
// Route::get('/',function() {
//     return ['hello'];
// })->middleware('auth:sanctum');
// Route::prefix('userarea')

// Route::post('login')

// 7808b50d-b0bf-4987-bc45-4978b935ad8b