<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $e
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $e)
    {
        // Handle validation errors for API routes
        if ($e instanceof \Illuminate\Validation\ValidationException && $request->expectsJson()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);
        }

        // Handle 404 errors for API routes
        if ($e instanceof NotFoundHttpException && $request->expectsJson()) {
            return response()->json([
                'error' => 'NOT_FOUND',
                'message' => 'The requested resource could not be found.',
                'code' => 'NOT_FOUND',
            ], 404);
        }

        // Handle 404 errors for web routes
        if ($e instanceof NotFoundHttpException && !$request->expectsJson()) {
            // For non-API routes, return the React app's index.html
            $index = public_path('index.html');
            if (file_exists($index)) {
                return response()->file($index);
            }
        }

        return parent::render($request, $e);
    }
}
