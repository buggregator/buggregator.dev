<?php

declare(strict_types=1);

namespace App\Application\Bootloader;

use App\Endpoint\Event\LikeListener;
use Spiral\Boot\Bootloader\Bootloader;
use Spiral\Boot\EnvironmentInterface;

final class EventsBootloader extends Bootloader
{
    public function defineSingletons(): array
    {
        return [
            LikeListener::class => static fn(EnvironmentInterface $env) => new LikeListener(
                randomFactor: (int)$env->get('RANDOM_FACTOR', 20),
            ),
        ];
    }
}
