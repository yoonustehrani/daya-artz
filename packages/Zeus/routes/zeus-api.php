<?php

use App\Http\Middleware\setPreferedLanguage;
use Illuminate\Support\Facades\Route;
use Zeus\Http\Controllers\Api\ApiDefaultController;
use Zeus\Http\Controllers\Api\FileController;
use Zeus\Http\Controllers\RelationController;
use Zeus\Models\Permission;

// use Zeus\Http\Controllers\Api\ModelRowController;

Route::prefix('zeus')->middleware([
    setPreferedLanguage::class,
    'auth:sanctum'
])->name('zeus.')->group(function() {
    Route::get('/', fn() => response()->json(['okay' => true]));
    // Route::get('model_types/{modeltype}/groups', [ModelRowController::class, 'groups']);
    // Route::apiResource('model_types.model_rows', ModelRowController::class)->shallow();
    Route::apiResource('files', FileController::class);
    Route::get('policy/permissions', function() {
        return Permission::where('active', 1)->limit(10)->get();
    })->name('policy.permissions.index');

    $modeltypes = \ZeusPanel::getModelTypes();
    
    foreach ($modeltypes as $modeltype) {
        if (! $modeltype->controller) {
            Route::apiResource($modeltype->slug, ApiDefaultController::class)->parameters([$modeltype->slug => 'id']);
            // Route::prefix($modeltype->slug)->name("{$modeltype->slug}.")->group(function() use($modeltype) {
            //     Route::get('/relations/{row}/new-row', [RelationController::class, 'create'])->name('relations.create');
            //     // foreach ($modeltype->relations as $relation) {
            //     //     if (in_array($relation->type, ['hasMany'])) {
                        
            //     //     }
            //     // }
            // });
        }
    }
});