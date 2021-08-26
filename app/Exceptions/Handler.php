<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = ['current_password', 'password', 'password_confirmation'];

    public function register(): void
    {
        $this->reportable(
            function (Throwable $e) {
                //
            }
        );
    }

    /**
     * @throws Throwable
     */
    public function render($request, Throwable $e): Response
    {
        if ($e instanceof ValidationException) {
            return response()->json(
                [
                'message' => 'validation exception message',
                'code' => 20000,
                'errors' => $e->validator->errors()->getMessages()
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
        if ($e instanceof ExceptionGoodsNotFound) {
            return response()->json(
                [
                'message' => $e->getMessage(),
                'code' => 20001,
                ],
                Response::HTTP_NOT_FOUND
            );
        }

        return parent::render($request, $e);
    }
}
