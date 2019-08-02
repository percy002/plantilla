<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];
    

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        if (app()->bound('sentry') && $this->shouldReport($exception)){
            app('sentry')->captureException($exception);
        }

        parent::report($exception);
    }
        
    
    

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        #ModelNotFoundException 
        #AothorizationException
        #TokenMismatchexception
        #FatalThowableError
        #getStatusCode() 404,401,50,405 ... http responses
        if ($exception instanceof ModelNotFoundException) {
            # code...
            $exception = new NotFoundHttpException($exception->getMessage(),$exception);
            // return response()->view('errores.404',['error'=>$exception->getMessage()],$exception);

        }elseif($exception instanceof AuthorizationException){
            return response()->view('errores.404',['error'=>'error'],403);

        }elseif($exception instanceof TokenMismatchException){
            return response()->view('errores.404',['error'=>'error'],419);

        }        
        elseif($exception instanceof \Symfony\Component\Debug\Exception\FatalThrowableError){
            return response()->view('errores.404',['error'=>$exception->getMessage()],404);

        }
        else if ($exception->getStatusCode()===404) {
            return response()->view('errores.404',['error'=>'error 404, lo siento :('],404);
        }

        //return parent::render($request, $exception);
        
    }
}
