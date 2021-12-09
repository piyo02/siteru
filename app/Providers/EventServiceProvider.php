<?php

namespace App\Providers;

use App\Models\Gallery;
use App\Models\News;
use App\Models\Policy;
use App\Models\Role;
use App\Models\Sector;
use App\Observers\GalleryObserver;
use App\Observers\PolicyObserver;
use App\Observers\NewsObserver;
use App\Observers\RoleObserver;
use App\Observers\SectorObserver;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Gallery::observe(GalleryObserver::class);
        Policy::observe(PolicyObserver::class);
        News::observe(NewsObserver::class);
        Role::observe(RoleObserver::class);
        Sector::observe(SectorObserver::class);
    }
}
