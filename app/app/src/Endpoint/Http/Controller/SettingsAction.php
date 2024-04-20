<?php

declare(strict_types=1);

namespace App\Endpoint\Http\Controller;

use App\Application\Http\Response\ResourceInterface;
use App\Endpoint\Http\Resource\SettingsResource;
use App\Github\ClientInterface;
use Spiral\Router\Annotation\Route;

final readonly class SettingsAction
{
    #[Route(route: 'settings', name: 'settings', methods: ['GET'], group: 'api')]
    public function __invoke(ClientInterface $client): ResourceInterface
    {
        return new SettingsResource([
            'github' => [
                'server' => [
                    'stars' => $client->getStars('buggregator/server'),
                    'last_version' => $client->getLastVersion('buggregator/server'),
                ],
                'trap' => [
                    'stars' => $client->getStars('buggregator/trap'),
                    'last_version' => $client->getLastVersion('buggregator/trap'),
                ],
            ],
        ]);
    }
}
