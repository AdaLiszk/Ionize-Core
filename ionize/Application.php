<?php
namespace Ionize;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Laravel\Lumen\Application as LumenApplication;
use Dotenv\Exception\InvalidPathException;
use Dotenv\Dotenv;

/**
 * Ionize Application Class
 *
 * @package Ionize
 * @author: Ádám Liszkai <adaliszk@gmail.com>
 * @since: v2.0
 *
 * @inheritdoc
 */
class Application extends LumenApplication
{
    const VERSION = '2.0.0-dev';
    protected static $constructTimestamp = 0;


    /**
     * Create a new Ionize application instance.
     *
     * @param  array|null  $configuration
     */
    public function __construct(array $configuration = null)
    {
        self::$constructTimestamp = microtime(true);

        try {
            (new Dotenv(__DIR__.'/../'))->load();
        } catch (InvalidPathException $e) {
            // @think: Handle it?
        }

        // Override with the configuration
        if (!empty($configuration))
        {
            // @think Could be a job of a different class?
            foreach ($configuration as $name => $value) {
                putenv("{$name}={$value}");
            }
        }

        parent::__construct(realpath(__DIR__ . '/../'));

        $this->withEloquent();
        //$this->withFacades();

        $this->middleware([
            Middlewares\AssetsHandler::class,
            Middlewares\OutputHandler::class
        ]);

        // Registering ExceptionHandler
        $this->singleton(ExceptionHandler::class, Exceptions\Handler::class);

        if ($this->runningInConsole())
        {
            // Registering the Artisan Kernel
            $this->singleton(Kernel::class, Console\Kernel::class);
        }

        //$this->register(Providers\ApplicationService::class);
        //$this->register(Providers\EventService::class);
        //$this->register(Providers\AuthService::class);
    }

    /**
     * Get the version number of the application.
     *
     * @return string
     */
    public function version()
    {
        return 'IonizeCMS (' . self::VERSION . ') powered by ' . parent::version();
    }

    public function elapsedTime(int $precision = 4): float
    {
        $elapsedTime = microtime(true) - self::$constructTimestamp;
        $elapsedTime = round(($elapsedTime*1000), $precision);

        return $elapsedTime;
    }

    public function memoryUsage(int $precision = 4): float
    {
        $memoryUsage = memory_get_usage(true);
        $memoryUsage = round(($memoryUsage/1024), $precision);

        return $memoryUsage;
    }
}
/* End of file: Application.php */
/* Location: Ionize\Application */
