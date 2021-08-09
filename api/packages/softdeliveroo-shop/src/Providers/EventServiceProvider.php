<?php

namespace SoftDeliveroo\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use SoftDeliveroo\Events\OrderCreated;
use SoftDeliveroo\Listeners\ManageProductInventory;
use SoftDeliveroo\Listeners\SendOrderCreationNotification;

class EventServiceProvider extends ServiceProvider
{

    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        OrderCreated::class => [
            SendOrderCreationNotification::class,
            ManageProductInventory::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
