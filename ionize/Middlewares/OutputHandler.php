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

namespace Ionize\Middlewares;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Ionize\Application;
use Ionize\Content;
use Ionize\URL;
use Closure;

/**
 * OutputHandler Middleware
 *
 * @package: Ionize\Middlewares
 * @author: Ádám Liszkai <adaliszk@gmail.com>
 * @since: v2.0.0
 */
class OutputHandler
{
    /** @var Application $app */
    private $app;

    /** @var URL $url */
    private $url;

    /** @var Content $content */
    private $content;

    /**
     * OutputHandler constructor
     *
     * @param Application $appInstance
     * @param URL $urlModel
     * @param Content $contentModel
     */
    public function __construct(Application $appInstance, URL $urlModel, Content $contentModel)
    {
        $this->app = $appInstance;
        $this->content = $contentModel;
        $this->url = $urlModel;
    }

    /**
     * Handle the middleware action
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($this->app->runningInConsole())
        {
            return $next($request);
        }

        /** @var Collection $result */
        $result = $this->url->getByURI("/{$request->path()}");
        if ($result->count()>0)
        {
            $url = $result->first();
            $content = $this->content->getById($url->id_content);

            $response = view('sample_content')->withContent($content);

            if (env('APP_BENCHMARKS', false))
            {
                $replace = [
                    '{elapsed_time}'    =>  $this->app->elapsedTime(),
                    '{memory_usage}'    =>  $this->app->memoryUsage()
                ];

                $response = str_replace(array_keys($replace), array_values($replace), $response);
            }

            return $response;
        }

        return $next($request);
    }
}
/* End of file: OutputHandler.php */
/* Location: Ionize\Middlewares */
