<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\WebsiteController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Ticket;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', function() {
//     $user = User::first();
//     // $verification = "";
//     // return $user->generateVerificationCode('verify_phone', generate_code(), false, 2);
//     // event(new UserRegistered($user));
//     return $user;
// });

Route::get('/', [WebsiteController::class, 'index'])->name('home');

Route::get('services', [WebsiteController::class, 'services'])->name('services.index');
Route::get('services/{slug}', [WebsiteController::class, 'service'])->name('services.show');

Route::get('blog', [PostController::class, 'index'])->name('blog.index');
Route::get('blog/{slug}', [PostController::class, 'show'])->name('blog.show');

Route::get('portfolio/{slug}', [PortfolioController::class, 'show'])->name('portfolio.show');

Route::view('about', 'pages.about')->name('about');
Route::view('contact', 'pages.contact')->name('contact');
Route::view('policy', 'pages.policy')->name('policy');

Route::post('order/{service}/plan/{plan}', function(Request $request, $service, $plan) {
    $service = Service::findOrFail($service);
    $plan = $service->plans()->select('price', 'title', 'expires_at')->unexpired()->findOrFail($plan);
    return [$service, $plan];
})->whereNumber(['service', 'plan'])->name('order.store'); // ->middleware('auth:sanctum')

Route::view('userarea/{path?}', 'pages.userarea')->where('path', '.*')->name('userarea');


Route::get('email/verify/{id}/{hash}', function($id, $hash, Request $request) {
    $user = User::findOrFail($id);
    if (! hash_equals($hash, sha1($user->email))) {
        abort(401);
    }
    if ($user->hasVerifiedEmail()) {
        return 'email is already verified';
    }
    if ($user->markEmailAsVerified()) {
        # run event for user
    }
    return redirect()->to(route('userarea'));
})->middleware('signed')->name('verification.email.verify');

Route::get('test', function (Request $request) {
    // return config('sanctum');
    if ($request->has('delete')) {
        App\Models\Service::whereRaw("1=1")->delete();
        App\Models\File::whereRaw("1=1")->delete();
        \DB::delete('delete from fileables where 1=1');
        return redirect()->to(route('tempo'));
    }
    return App\Models\Service::with('plans', 'portfolios.images')->get()->groupBy('group');
    // return view('test');
    // return App\Models\Order::latest()->get();
// $user = User::find(2);
    // $user->notifyNow(new VerificationNotification([SMSChannel::class]));
    // $json_string = '{"name": "yoonus", "age": 18}';
    // dd(json_decode($json_string));
    // $offers = App\Offer::limit(3)->get();
    // return $offers;
    // $company = Company::first();
    // $company->load('business_type', 'product_type');
    // return $company;
})->name('tempo');


Route::get('payment', function() {
    $zp = (new \App\Utils\Payment)->getDriver('zarinpal');
    if ($zp) {
        $zp->setMerchantId('00000000-0000-0000-0000-000000000000');
        $zp->sandbox();
        return $zp->purchase(1000, "تست درگاه دایا", []);
    }
});

Route::match(['get', 'post'], 'payment/{driver}/verify', function($driver) {
    return [
        'driver' => $driver,
        'request' => request()->all()
    ];
})->name('payment.verify');


Route::get('orders', function() {
    return App\Models\Order::latest()->get();
});