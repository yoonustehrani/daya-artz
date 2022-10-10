<?php

// use App\Broadcasting\SMSChannel;
// use App\Events\UserVerifiedTheirAccount;
use App\Http\Controllers\Api\VerificationController;
use App\Http\Controllers\LandingsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\WebsiteController;
// use App\Models\User;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\SitemapController;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

// use App\Http\Utils\TelegramBot;
// use App\Models\Service;
// use App\Notifications\WelcomeNotification;
// use Illuminate\Support\Carbon;
// use Illuminate\Support\Facades\Storage;
// use Ramsey\Uuid\Uuid;

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

Route::get('/', [WebsiteController::class, 'index'])->name('home');

Route::get('services', [WebsiteController::class, 'services'])->name('services.index');
Route::get('services/{slug}', [WebsiteController::class, 'service'])->name('services.show');

Route::get('blog', [PostController::class, 'index'])->name('blog.index');
Route::get('blog/{slug}', [PostController::class, 'show'])->name('blog.show');

Route::get('portfolio/{slug}', [PortfolioController::class, 'show'])->name('portfolio.show');
Route::get('landing/{slug}', [LandingsController::class, 'show'])->name('landings.show');

Route::get('about', [WebsiteController::class, 'page'])->name('about');
Route::get('policy', [WebsiteController::class, 'page'])->name('policy');
Route::get('contact', [WebsiteController::class, 'page'])->name('contact');

// Route::post('order/{service}/plan/{plan}', function(Request $request, $service, $plan) {
//     $service = Service::findOrFail($service);
//     $plan = $service->plans()->select('price', 'title', 'expires_at')->unexpired()->findOrFail($plan);
//     return [$service, $plan];
// })->whereNumber(['service', 'plan'])->name('order.store'); // ->middleware('auth:sanctum')

Route::view('userarea/{path?}', 'pages.userarea')->where('path', '.*')->name('userarea');
Route::view('web-catalog/{path?}', 'pages.catalog')->where('path', '.*')->name('web.catalog');

Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verifyEmail'])->middleware('signed')->name('verification.email.verify');
// Route::get('test', function (Request $request) {
//     $user = User::find(3);
//     $user->notifyNow(
//         (new WelcomeNotification)
//     );
//     // ->delay(['mail' => now()->addMinute(), SMSChannel::class => now()->addSeconds(10)])
//     return $user;
// //     $pattern = "xfi0x9hy0k";
// //     (new SMSTool)->getDriver('faraz')->sendPattern('+983000505', $user->phone_number, $pattern, [
// //         'code' => 
// //     ]);
// //     // return config('sanctum');
// //     // if ($request->has('delete')) {
// //     //     App\Models\Service::whereRaw("1=1")->delete();
// //     //     App\Models\File::whereRaw("1=1")->delete();
// //     //     App\Models\Image::whereRaw("1=1")->delete();
// //     //     App\Models\Post::whereRaw("1=1")->delete();
// //     //     App\Models\Tag::whereRaw("1=1")->delete();
// //     //     App\Models\Category::whereRaw("1=1")->delete();
// //     //     return redirect()->to(route('tempo'));
// //     // }
// //     // return App\Models\Service::with('plans', 'portfolios.images')->get()->groupBy('group');
// //     // return view('test');
// //     // return App\Models\Order::latest()->get();
// // // $user = User::find(2);
// //     // $user->notifyNow(new VerificationNotification([SMSChannel::class]));
// //     // $json_string = '{"name": "yoonus", "age": 18}';
// //     // dd(json_decode($json_string));
// //     // $offers = App\Offer::limit(3)->get();
// //     // return $offers;
// //     // $company = Company::first();
// //     // $company->load('business_type', 'product_type');
// //     // return $company;
// })->name('tempo');

// Route::get('email', function() {
//     $user = User::whereEmail("yoonustehrani@dayaartz.com")->first();
//     return new App\Mail\VerificationEmail($user, "https://google.com");
// });

Route::get('/sitemaps/sitemap-index.xml', [SitemapController::class, 'index'])->name('sitemaps.index');
Route::get('/sitemaps/{slug}-sitemap.xml', [SitemapController::class, 'show'])->name('sitemaps.show');

Route::get('payment/{driver}/verify', [PaymentController::class, 'update'])->name('payment.verify');

// Route::get('files/{file}/get', function(Request $request, $file) {
//     $file_path = "private/{$file}";
//     abort_if(! Storage::exists($file_path), 404);
//     return Storage::download($file_path, "hello.txt");
// });

\ZeusPanel::routes();