<?php

use App\Exceptions\InternalServerErrorException;
use App\Exceptions\ValidationErrorsException;
use App\Helpers\GeneralHelper;
use App\Http\Middleware\AccountMustBeActive;
use App\Http\Middleware\AlwaysAcceptJson;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\MustBeVerified;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\SetDefaultLocale;
use App\Http\Middleware\TrustProxies;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull;
use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance;
use Illuminate\Foundation\Http\Middleware\TrimStrings;
use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Http\Middleware\HandleCors;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        channels: __DIR__ . '/../routes/channels.php',
        health: '/up',
    )
    //    ->withBroadcasting(
    //        __DIR__.'/../routes/channels.php',
    //        ['prefix' => 'api', 'middleware' => ['api', GeneralHelper::authMiddleware()]],
    //    )
    ->withMiddleware(function (Middleware $middleware) {
        //        $middleware->statefulApi();
        $middleware->append([
            SetDefaultLocale::class,
            AlwaysAcceptJson::class,
        ]);

        $middleware->api([
            'throttle:api',
        ]);
        $middleware->validateCsrfTokens(except: [
            'create-checkout-session/*',
        ]);
        $middleware->use([
            TrustProxies::class,
            HandleCors::class,
            PreventRequestsDuringMaintenance::class,
            ValidatePostSize::class,
            TrimStrings::class,
            ConvertEmptyStringsToNull::class,
        ]);

        $middleware->alias([
            'auth' => Authenticate::class,
            'guest' => RedirectIfAuthenticated::class,
            //            'permission' => PermissionMiddleware::class,
            'account_must_be_active' => AccountMustBeActive::class,
            'must_be_verified' => MustBeVerified::class,
            'Pusher' => Pusher\Pusher::class,
            //            'user_type_in' => CheckUserType::class,
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
            
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $httpResponse = (new class
        {
            use \App\Traits\HttpResponse;
        });

        $exceptions->renderable(function (ValidationErrorsException $e) use ($httpResponse) {
            return $httpResponse->validationErrorsResponse($e->getErrors());
        });


        $exceptions->renderable(function (NotFoundHttpException $e, $req) use ($httpResponse) {
            $msg = $e->getMessage();

            if (Str::contains($msg, 'No query', true)) {
                $msg = translate_word('record_not_found');
            }

            return $httpResponse->errorResponse(null, Response::HTTP_NOT_FOUND, $msg);
        });

        $exceptions->renderable(function (MethodNotAllowedHttpException $e, $request) use ($httpResponse) {
            return $httpResponse->errorResponse(
                null,
                Response::HTTP_METHOD_NOT_ALLOWED,
                $e->getMessage()
            );
        });

        // Too Many Requests


        $exceptions->renderable(function (HttpException $e) use ($httpResponse) {
            if ($e->getMessage() == 'Service Unavailable') {
                return $httpResponse->errorResponse(code: $e->getStatusCode(), message: translate_word('maintenance_mode'));
            }

            return $httpResponse->errorResponse(code: $e->getStatusCode(), message: $e->getMessage());
        });
    })
    ->create();
