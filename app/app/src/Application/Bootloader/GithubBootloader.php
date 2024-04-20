<?php

declare(strict_types=1);

namespace App\Application\Bootloader;

use App\Github\Client;
use App\Github\ClientInterface;
use App\Github\WebhookGate;
use Spiral\Boot\Bootloader\Bootloader;
use Spiral\Boot\EnvironmentInterface;
use Spiral\Cache\CacheStorageProviderInterface;

final class GithubBootloader extends Bootloader
{
    public function defineSingletons(): array
    {
        return [
            ClientInterface::class => static fn(CacheStorageProviderInterface $cache) => new Client(
                client: new \GuzzleHttp\Client([
                    'base_uri' => 'https://api.github.com/',
                    'headers' => [
                        'Accept' => 'application/vnd.github.v3+json',
                    ],
                ]),
                cache: $cache,
            ),

            WebhookGate::class => static fn(
                EnvironmentInterface $env,
            ) => new WebhookGate(secret: $env->get('GITHUB_WEBHOOK_SECRET', 'secret')),
        ];
    }
}
