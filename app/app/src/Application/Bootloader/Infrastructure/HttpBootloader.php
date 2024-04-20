<?php

declare(strict_types=1);

namespace App\Application\Bootloader\Infrastructure;

use App\Application\Bootloader\RoutesBootloader;
use App\Application\Http\Interceptor\JsonResourceInterceptor;
use App\Application\Http\Interceptor\StringToIntParametersInterceptor;
use App\Application\Http\Interceptor\UuidParametersConverterInterceptor;
use Spiral\Bootloader as Framework;
use Spiral\Bootloader\DomainBootloader;
use Spiral\Core\CoreInterface;
use Spiral\Cycle\Interceptor\CycleInterceptor;
use Spiral\DataGrid\Interceptor\GridInterceptor;
use Spiral\Domain\GuardInterceptor;
use Spiral\Nyholm\Bootloader\NyholmBootloader;

final class HttpBootloader extends DomainBootloader
{
    public function defineDependencies(): array
    {
        return [
            \Spiral\Bootloader\Http\HttpBootloader::class,
            Framework\Http\RouterBootloader::class,
            Framework\Http\JsonPayloadsBootloader::class,
            Framework\Http\CookiesBootloader::class,
            Framework\Http\SessionBootloader::class,
            Framework\Http\CsrfBootloader::class,
            Framework\Http\PaginationBootloader::class,

            NyholmBootloader::class,

            RoutesBootloader::class,
        ];
    }

    public function defineSingletons(): array
    {
        return [
            CoreInterface::class => [self::class, 'domainCore'],
        ];
    }

    protected static function defineInterceptors(): array
    {
        return [
            CycleInterceptor::class,

            JsonResourceInterceptor::class,
            StringToIntParametersInterceptor::class,
            UuidParametersConverterInterceptor::class,
        ];
    }
}
