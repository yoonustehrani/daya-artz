<?php

use App\Events\UserVerifiedTheirAccount;
use App\Http\Controllers\LandingsController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\WebsiteController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Mail\OrderSubmit;
use App\Mail\PaymentMade;
use App\Mail\PrePaymentReminder;
use App\Mail\Welcome;
use App\Mail\Wellcome;
use App\Models\Order;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Ticket;
use App\Models\Transaction;
use App\Notifications\WelcomeNotification;
use Illuminate\Support\Facades\Mail;

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
Route::get('landing/{slug}', [LandingsController::class, 'show'])->name('landings.show');
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
        App\Models\Image::whereRaw("1=1")->delete();
        App\Models\Post::whereRaw("1=1")->delete();
        App\Models\Tag::whereRaw("1=1")->delete();
        App\Models\Category::whereRaw("1=1")->delete();
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


Route::get('email', function() {
    // return new OrderSubmit();
    // return new Welcome(User::first());
    $order = Order::latest()->first();
    return new PrePaymentReminder($order);
    // return view('emails.welcome');
    // $trs = Transaction::first();
    // $user = User::first();
    // event(new UserVerifiedTheirAccount($user));
    // $user->notifyNow(new WelcomeNotification);

    // return 'sent';
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