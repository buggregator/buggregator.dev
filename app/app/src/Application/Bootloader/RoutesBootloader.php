<?php

declare(strict_types=1);

namespace App\Application\Bootloader;

use Spiral\Bootloader\Http\RoutesBootloader as BaseRoutesBootloader;
use Spiral\Cookies\Middleware\CookiesMiddleware;
use Spiral\Csrf\Middleware\CsrfMiddleware;
use Spiral\Debug\StateCollector\HttpCollector;
use Spiral\Filter\ValidationHandlerMiddleware;
use Spiral\Http\Middleware\ErrorHandlerMiddleware;
use Spiral\Http\Middleware\JsonPayloadMiddleware;
use Spiral\Router\Bootloader\AnnotatedRoutesBootloader;
use Spiral\Router\GroupRegistry;
use Spiral\Session\Middleware\SessionMiddleware;

/**
 * A bootloader that configures the application's routes and middleware.
 *
 * @link https://spiral.dev/docs/http-routing
 */
final class RoutesBootloader extends BaseRoutesBootloader
{
    public function defineDependencies(): array
    {
        return [
            AnnotatedRoutesBootloader::class,
        ];
    }

    protected function globalMiddleware(): array
    {
        return [
            ErrorHandlerMiddleware::class,
            JsonPayloadMiddleware::class,
            HttpCollector::class,
        ];
    }

    protected function middlewareGroups(): array
    {
        return [
            'web' => [
                CookiesMiddleware::class,
                SessionMiddleware::class,
                CsrfMiddleware::class,
                ValidationHandlerMiddleware::class,
            ],
            'api' => [
                ValidationHandlerMiddleware::class,
            ],
        ];
    }

    protected function configureRouteGroups(GroupRegistry $groups): void
    {
        $groups->getGroup('api')->setPrefix('/api');
    }
}
