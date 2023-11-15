<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = ['current_password', 'password', 'password_confirmation'];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
            if ($e instanceof ModelNotFoundException) {
                return $this->modelNotFoundResponse($e);
            }
            if ($e instanceof NotFoundHttpException) {
                return $this->notFoundHttpResonse($e);
            }
            if ($e instanceof AuthorizationException) {
                return $this->authorizationResonse($e);
            }
            if ($e instanceof AuthenticationException) {
                return $this->authenticationResonse($e);
            }
            if ($e instanceof ValidationException) {
                return $this->validationResponse($e);
            } else {
                
                return response()->data(
                    key: 'error',
                    message:   $e->getMessage(),
                    statusCode: 500
                );
            }
        parent::render($request, $e);
    }

    private function modelNotFoundResponse(ModelNotFoundException $exception)
    {
        $modelName = strtolower(class_basename($exception->getModel()));
        return response()->data(
            key: 'error',
            message: "$modelName not found",
            statusCode: 404, 
        );
    }

    private function validationResponse(ValidationException $e)
    {
        return response()->data(
            key: 'error',
            message:$e->getMessage(),
            statusCode: 422);
    }

    public function notFoundHttpResonse(NotFoundHttpException $e)
    {
        return response()->data(
            key: 'error',
            message: 'the URL cannot be found',
            statusCode: 404);
    }

    public function authorizationResonse(AuthorizationException $e)
    {
        $message = $e->getMessage();
        return response()->data(
            key: 'error',
            message: $message,
            statusCode: 403);
    }
    public function authenticationResonse(AuthenticationException $e)
    {
        $message = $e->getMessage();
        return response()->data(
            key: 'error',
            message: $message,
            statusCode: 401);
    }
}
