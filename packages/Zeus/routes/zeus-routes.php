<?php

use App\Http\Middleware\setPreferedLanguage;
use App\Jobs\ReportZeusAdjustments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Zeus\Http\Controllers\Auth\AdminController;
use Zeus\Http\Controllers\Auth\LoginController;
use Zeus\Http\Controllers\Auth\ProfileController;
use Zeus\Http\Controllers\BaseController;
use Zeus\Http\Controllers\DefaultController;
use Zeus\Http\Controllers\ExtraDefaultController;
use Zeus\Http\Controllers\ModelTypeController;
use Zeus\Http\Controllers\ModelRowController;
use Zeus\Http\Controllers\ModelRelationController;
use Zeus\Http\Controllers\RelationController;
use Zeus\Http\Controllers\SettingController;

Route::prefix('zeus')->name('zeus.')->group(function() {
    Route::middleware(['auth:zeus', setPreferedLanguage::class])->group(function () {
        Route::view('/', 'zview::pages.dashboard')->name('dashboard');
        // Route::get('/jobs', function() {
        //     // ReportZeusAdjustments::dispatch($user)->delay(now()->addSeconds(5));
        //     // \Log::alert("returned");
        //     // return ['okay' => true];
        // })->name('jobs');
        Route::get('/website', [BaseController::class, 'website'])->name('website');
        Route::resource('admins', AdminController::class);
        Route::get('/profile', [ProfileController::class, 'show'])->name('auth.profile');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('auth.profile.update');
        Route::patch('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('auth.profile.update.avatar');
        Route::patch('/profile/auth', [ProfileController::class, 'authUpdate'])->name('auth.profile.update.auth');
        Route::apiResource('modeltypes.relations', ModelRelationController::class)->except('show')->shallow();
        Route::get('modelrows/{modelrow}/edit', [ModelRowController::class, 'edit'])->name('modelrows.edit');
        Route::put('modelrows/{modelrow}', [ModelRowController::class, 'update'])->name('modelrows.update');
        Route::resource('modeltypes', ModelTypeController::class);   
        Route::match(['put', 'patch'],'/settings/groups/{group}', [SettingController::class, 'updateGroup'])->name('settings.groups.update');
        $modeltypes = \ZeusPanel::getModelTypes();
        foreach ($modeltypes as $modeltype) {
            $slug = $modeltype->slug;
            $controller = $modeltype->controller ?: DefaultController::class;
            $extra_controller = ExtraDefaultController::class;
            Route::prefix($slug)->name("{$slug}.")->group(function() use($controller, $extra_controller, $modeltype) {
                Route::get('/trash', [$extra_controller, 'trash'])->name('trash');
                Route::post('{id}/clone', [$extra_controller, 'clone'])->name('clone');
                Route::post('{id}/restore', [$controller, 'restore'])->name('restore');
                foreach ($modeltype->relations as $relation) {
                    if (in_array($relation->type, ['belongsToMany', 'hasMany', 'morphMany'])) {
                        Route::get('{id}/' . $relation->local_method, [RelationController::class, 'index'])->name($relation->local_method);
                    }
                }
            });
            if ($modeltype->controller && is_array(optional($modeltype->details)->auto)) {
                Route::resource($slug, DefaultController::class)->only($modeltype->details->auto)->parameters([$slug => 'id']);
                Route::resource($slug, $modeltype->controller)->except($modeltype->details->auto)->parameters([$slug => 'id']);
            } else {
                $resourced_auto = Route::resource($slug, $controller)->parameters([$slug => 'id']);
                $auto = optional($modeltype->details)->auto;
                if (is_array($auto)) {
                    $resourced_auto->only($auto);
                }
            }
        }
        Route::view('/file-gallery', 'zview::pages.gallery')->name('file-gallery');
        Route::view('/test/multi', 'zview::components.forms.multi-select');
        Route::post('/test/multi', fn() => request()->input('options'));
        Route::name('custom.')->group(function() {
            $custom_route = config('zconfig.custom.routes');
            require $custom_route;
        });
    });
    // Auth Routes
    Route::name('auth.')->middleware(['guest:zeus'])->group(function () {
        Route::view('login', 'zview::pages.auth.login')->name('login.form');
        Route::post('login', [LoginController::class, 'store'])->name('login');
    });
    Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth:zeus')->name('auth.logout');
});
