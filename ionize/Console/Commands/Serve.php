<?php
/*
 * The MIT License (MIT)
 *
 * Copyright (C) 2009-2017 IonizeCMS Team <team@ionizecms.com>
 *
 * Permission is hereby granted,  free of charge,  to any person  obtaining a copy
 * of this software  and associated documentation files  (the "Software"), to deal
 * in the Software  without restriction,  including without limitation  the rights
 * to use,  copy,  modify,  merge,  publish,  distribute,  sublicense, and/or sell
 * copies  of  the  Software, and to  permit  persons  to  whom  the  Software  is
 * furnished to do so, subject to the following conditions:
 *
 * The above  copyright notice  and this  permission  notice  shall be included in
 * all copies  or substantial  portions of the Software.
 *
 * In the case the  software is used  by a  company for its own clients, it is not
 * permitted to  suggest that the  software is the  property of  the company or to
 * suggest  that the  software has  been created  and  developed by any other team
 * than the copyright holder.
 *
 * THE SOFTWARE  IS PROVIDED  "AS IS",  WITHOUT WARRANTY  OF ANY KIND,  EXPRESS OR
 * IMPLIED,  INCLUDING  BUT NOT  LIMITED TO  THE  WARRANTIES  OF  MERCHANTABILITY,
 * FITNESS FOR A  PARTICULAR  PURPOSE AND  NONINFINGEMENT.  IN NO  EVENT SHALL THE
 * AUTHORS  OR COPYRIGHT  HOLDERS  BE  LIABLE  FOR  ANY CLAIM,  DAMAGES  OR  OTHER
 * LIABILITY,  WHETHER IN AN  ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR  IN CONNECTION  WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 */

namespace Ionize\Console\Commands;

use Illuminate\Console\Command;
use Ionize\Application;
use Symfony\Component\Process\ProcessUtils;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Process\PhpExecutableFinder;

/**
 * Class Serve
 *
 * @package Ionize\Console\Commands
 * @author: Ádám Liszkai <adaliszk@gmail.com>
 * @since: v2.0.0
 */
class Serve extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'serve';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Serve a PHP Built in Webserver';

    /**
     * Execute the console command.
     *
     * @param Application $app
     * @return void
     */
    public function fire(Application $app)
    {
        chdir($app->basePath());
        $host = $this->input->getOption('host');
        $port = $this->input->getOption('port');
        $base = ProcessUtils::escapeArgument($app->basePath());
        $binary = ProcessUtils::escapeArgument((new PhpExecutableFinder)->find(false));
        $this->info("Ionize development server started on http://{$host}:{$port}/");

        passthru("{$binary} -S {$host}:{$port} {$base}/server");
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            [
                'host', null,
                InputOption::VALUE_OPTIONAL,
                'The host address to serve the application on.',
                env('SERVER_HOSTNAME', 'localhost')
            ],
            [
                'port', null,
                InputOption::VALUE_OPTIONAL,
                'The port to serve the application on.',
                env('SERVER_PORT', 8000)
            ],
        ];
    }
}
/* End of file Serve.php */
/* Location: Ionize\Console\Commands */
