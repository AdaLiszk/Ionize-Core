<?php

namespace Ionize\Providers;

use Illuminate\Support\ServiceProvider;
use Ionize\Application;

/**
 * App Services
 *
 * @package Ionize\Providers
 * @author: Ádám Liszkai <adaliszk@gmail.com>
 * @since: v2.0.0
 */
class ApplicationService extends ServiceProvider
{
    /** @var Application */
    protected $app;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
/* End of file: ApplicationService.php */
/* Location: Ionize\Providers */
