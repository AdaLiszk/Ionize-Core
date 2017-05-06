<?php

namespace Ionize\Providers;

use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventService extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Ionize\Events\SomeEvent' => [
            'Ionize\Listeners\EventListener',
        ],
    ];
}
/* End of file: EventService.php */
/* Location: Ionize\Providers */
