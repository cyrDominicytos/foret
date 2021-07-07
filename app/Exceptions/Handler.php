<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Validation\ValidationException::class,
        \Illuminate\Session\TokenMismatchException::class,
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
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $e)
    {
        
        //TODO : Traiter TokenMismatchException
        if ($e instanceof ModelNotFoundException) {
            if ($request->expectsJson()) {
                return parent::render($request, $e);
            }else{
                return response()->view('errors.404', [], 404);
            }
        }
        if ($e instanceof \Illuminate\Validation\ValidationException) {
            return parent::render($request, $e);
        }
        if ($e instanceof \Illuminate\Auth\AuthenticationException) {
            return parent::render($request, $e);
        }
        if ($e instanceof \Illuminate\Session\TokenMismatchException) {
            if ($request->expectsJson()) {
                return parent::render($request, $e);
            }else{
                return redirect(route('login'));
            }
        }
        if ($e instanceof \Illuminate\Routing\Exceptions\UrlGenerationException) {
            return redirect(route('login'));
        }
        if ($e instanceof \Illuminate\Validation\UnauthorizedException) {
            return redirect(route('login'));
        }

        if ($this->isHttpException($e)) {
            if ($request->expectsJson()) {
                return parent::render($request, $e);
            }else{
                return response()->view('errors.' . $e->getStatusCode(), [], $e->getStatusCode());
            }
        } else {
            // Custom error 500 view on production
            if (app()->environment() == 'production' or app()->environment() == 'development') {
                \Log::error($e->getTraceAsString());
                //Si l'erreur contient ce message, n'envoyer pas de courriel
                if (strpos($e->getMessage(), 'Route [] not defined') !== false) {
                    return parent::render($request, $e);
                }else{
                    $attributes = [
                        'view_url' => 'emails.exception',
                        'data' => [
                            "contenu" => $e->getMessage(),
                            "fullUrl" => $request->fullUrl(),
                            "ip" => $request->ip()
                        ],
                        'destinataires' => [env('MAIL_ERREUR', 'valentin.akando@gmail.com')],
                        'sujet' => __('Erreur Colis Transit')
                    ];
                    mail_queue(new \App\Mail\CourrielNotifier($attributes));
                    
                }
                
                if ($request->expectsJson()) {
                    return parent::render($request, $e);
                }else{
                    return response()->view('errors.500', [], 500);
                }
            }
            return parent::render($request, $e);
        }
    }
    
    /**
     * Redéfinition de cette fonction à cause de l'API, pour personnalisr le message
     * @param type $request
     * @param \Illuminate\Auth\AuthenticationException $exception
     * @return mixed
     */
    public function unauthenticated($request, \Illuminate\Auth\AuthenticationException $exception) {
        if ($request->expectsJson()) {
            return response()->json([
                'message' => __('Veuillez-vous connecter')
            ], 401);
        }
        return redirect(route('login'));
    }
    
    /**
     * 
     * @param type $request
     * @param \Illuminate\Auth\Access\AuthorizationException $exception
     * @return mixed
     */
    public function unauthorized($request, \Illuminate\Auth\Access\AuthorizationException $exception) {
        if ($request->expectsJson()) {
            return response()->json([
                'message' => __('Opération non permise')
            ], 401);
        }
        return redirect(route('login'));
    }
}
