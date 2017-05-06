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

use Ionize\Application;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Closure;

/**
 * AssetsHandler Controller
 *
 * @package Ionize\Controllers
 * @author: Ádám Liszkai <adaliszk@gmail.com>
 * @since: v2.0
 */
class AssetsHandler
{
    private $app;

    /**
     * AssetsHandler constructor.
     *
     * @param Application $applicationInstance
     */
    public function __construct(Application $applicationInstance)
    {
        $this->app =& $applicationInstance;
    }

    /**
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle(Request $request, Closure $next)
    {
        if (strpos($request->path(), 'assets/') === 0)
        {
            $assetFile = $this->app->resourcePath() . DIRECTORY_SEPARATOR . $request->path();

            if (file_exists($assetFile) && is_file($assetFile))
            {
                $fileContents = file_get_contents($assetFile);
                $mimeType = mime_content_type($assetFile);
                $baseName = basename($assetFile);

                return response($fileContents)
                    ->header('Content-Type', $mimeType)
                    ->header('Pragma', 'public')
                    ->header('Content-Disposition', 'inline; filename="'.$baseName.'"')
                    ->header('Cache-Control', 'max-age=60, must-revalidate');
            }
        }

        return $next($request);
    }

    /*
    public function addLinkHeaders(string $viewName)
    {
        if($this->request->server('SERVER_PROTOCOL') != 'HTTP/2.0') return FALSE;

        $fileName = $this->app->resourcePath(str_replace('.','/', 'views/'.$viewName).'.json');
        if(file_exists($fileName))
        {
            $payloadList = json_decode(file_get_contents($fileName));
            foreach($payloadList as $item)
            {
                $baseUrl = $item->local ? $this->request->getBaseUrl() : '';
                header("Link: <{$baseUrl}{$item->uri}>; rel=preload; as={$item->as}", false);
            }
        }

        return '';
    }
    */
}
/* End of file: AssetsHandler.php */
/* Location: Ionize\Middlewares */
