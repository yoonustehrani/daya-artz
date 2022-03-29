<?php

namespace Zeus;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Zeus\Policies\ZeusModelPolicy;
use Zeus\Traits\InteractWithPolicies;
use Zeus\View\Components\FormField;
// use Zeus\View\Components\GroupModelrows;
use Zeus\View\Components\IndexData;
use Zeus\View\Components\IndexRelation;
use Zeus\View\Components\LayoutDefault;
use Zeus\View\Components\RelationFormField;
use Zeus\View\Components\SettingField;
use Zeus\View\Components\ViewData;

class ZeusServiceProvider extends ServiceProvider
{
    use InteractWithPolicies;

    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        \Zeus\Models\Permission::class => \Zeus\Policies\PermissionPolicy::class,
        \Zeus\Models\Role::class => \Zeus\Policies\RolePolicy::class,
        \Zeus\Models\User::class => \Zeus\Policies\AdminPolicy::class,
        \Zeus\Models\ModelType::class => \Zeus\Policies\ModelTypePolicy::class,
        \Zeus\Models\ZeusModel::class => \Zeus\Policies\ZeusModelPolicy::class
    ];

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/zeus-config.php',
            'zconfig'
        );
        $this->app->singleton(Zeus::class, function($app) {
            return new Zeus();
        });
    }
    public function boot()
    {
        $this->loadMigrationsFrom([
            __DIR__ . '/../database/migrations',
            __DIR__ . "/../../ZeusExtensions/database/migrations"
        ]);
        
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'zlang');
        $this->loadJsonTranslationsFrom(__DIR__ . '/../resources/lang/');
        $this->loadViewsFrom([__DIR__ . '/../resources/views', __DIR__ . '/../../ZeusExtensions/resources/views'], 'zview');
        $this->loadViewComponentsAs('zview', [
            LayoutDefault::class,
            FormField::class,
            RelationFormField::class,
            ViewData::class,
            IndexData::class,
            IndexRelation::class,
            SettingField::class
        ]);
        $this->registerPolicies();
        Gate::define('create-zeus-model', [ZeusModelPolicy::class, 'create']);
        Gate::define('update-zeus-model', [ZeusModelPolicy::class, 'update']);
        Gate::define('view-zeus-model', [ZeusModelPolicy::class, 'view']);
        Gate::define('delete-zeus-model', [ZeusModelPolicy::class, 'delete']);
        Gate::define('viewAny-zeus-model', [ZeusModelPolicy::class, 'viewAny']);
        Gate::define('restore-zeus-model', [ZeusModelPolicy::class, 'restore']);
        Gate::define('forceDelete-zeus-model', [ZeusModelPolicy::class, 'forceDelete']);

        $this->publishes([
            __DIR__ . '/../database/seeders/' => database_path('seeders')
        ]);
    }
}