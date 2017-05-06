<?php
namespace Tests;

use Ionize\Application;
use Laravel\Lumen\Testing\TestCase as LumenTestCase;

abstract class TestCase extends LumenTestCase
{
    /** @var Application */
    protected $app;

    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        ini_set('display_errors', 'On');
        error_reporting(-1);

        $this->app = new Application();

        return $this->app;
    }
}
