<?php
namespace Ionize\Exceptions;

use Exception;
use ReflectionClass;

use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler
{
    //private $variables = [];

    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        /* $reflection = new ReflectionClass($e);
        $this->variables['name'] = $reflection->getName();
        $this->variables['shortName'] = $reflection->getShortName();
        $this->variables['file'] = str_replace(base_path(), '', $e->getFile());
        $this->variables['line'] = $e->getLine();
        $this->variables['code'] = $e->getCode();
        $this->variables['message'] = $e->getMessage();
        $this->variables['trace'] = $e->getTrace();
        $this->variables['basePath'] = base_path();

        if($reflection->getShortName() == 'NotFoundHttpException')
        {
            $this->variables['uri_path'] = $request->path();
            $content = view('cms.not_found', $this->variables);
            return response($content, 404);
        }
        else
        {
            // @think: Settings for showing a custom content when it's happening
            $content = view('cms.exception', $this->variables);
            return response($content, 500);
        } */

        return parent::render($request, $e);
    }
}
/* End of file: Handler.php */
/* Location: Ionize\Exceptions */
