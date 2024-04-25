<?php

declare(strict_types=1);

namespace App\Application;

use App\Application\Bootloader\EventsBootloader;
use App\Application\Bootloader\GithubBootloader;
use Spiral\Boot\Bootloader\CoreBootloader;
use Spiral\DotEnv\Bootloader\DotenvBootloader;
use Spiral\League\Event\Bootloader\EventBootloader;
use Spiral\Prototype\Bootloader\PrototypeBootloader;
use Spiral\Tokenizer\Bootloader\TokenizerListenerBootloader;

class Kernel extends \Spiral\Framework\Kernel
{
    public function defineSystemBootloaders(): array
    {
        return [
            CoreBootloader::class,
            DotenvBootloader::class,
            TokenizerListenerBootloader::class,
        ];
    }

    public function defineBootloaders(): array
    {
        return [
            Bootloader\Infrastructure\LogsBootloader::class,

            Bootloader\Infrastructure\ConsoleBootloader::class,
            Bootloader\Infrastructure\HttpBootloader::class,
            Bootloader\Infrastructure\SecurityBootloader::class,
            Bootloader\Infrastructure\CycleOrmBootloader::class,
            Bootloader\Infrastructure\RoadRunnerBootloader::class,

            EventBootloader::class,

            PrototypeBootloader::class,

            GithubBootloader::class,
            EventsBootloader::class,
        ];
    }
}
