<?php

namespace App\Providers;

use App\Events\QuickOrderSubmitted;
use App\Events\UserRegistered;
use App\Events\UserVerifiedTheirAccount;
use App\Events\FormAnswered;
use App\Listeners\NotifyAdminsOfQuickOrder;
use App\Listeners\SendQuickOrderNotification;
use App\Listeners\SendVerificationNotification;
use App\Listeners\SendWelcomeNotification;
use App\Listeners\SendFormAnsweredNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        UserRegistered::class => [
            SendVerificationNotification::class
        ],
        UserVerifiedTheirAccount::class => [
            SendWelcomeNotification::class
        ],
        QuickOrderSubmitted::class => [
            NotifyAdminsOfQuickOrder::class,
            SendQuickOrderNotification::class
        ],
        FormAnswered::class => [
            SendFormAnsweredNotification::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
