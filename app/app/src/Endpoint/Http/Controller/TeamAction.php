<?php

declare(strict_types=1);

namespace App\Endpoint\Http\Controller;

use App\Application\Http\Response\ResourceInterface;
use App\Endpoint\Http\Resource\TeamCollection;
use App\Endpoint\Http\Resource\TeamResource;
use Spiral\Router\Annotation\Route;

final readonly class TeamAction
{
    #[Route(route: 'team', name: 'team', methods: ['GET'], group: 'api')]
    public function __invoke(): ResourceInterface
    {
        return new TeamCollection([
            [
                'name' => 'Pavel Buchnev',
                'role' => 'Creator of Buggregator',
                'avatar' => 'https://avatars.githubusercontent.com/u/773481?v=4',
                'github' => 'https://github.com/butschster',
            ],
            [
                'name' => 'Aleksei Gagarin',
                'role' => 'PHP developer',
                'avatar' => 'https://avatars.githubusercontent.com/u/4152481?v=4',
                'github' => 'https://github.com/roxblnfk',
            ],
            [
                'name' => 'Andrey Kuchuk',
                'role' => 'Frontend developer',
                'avatar' => 'https://avatars.githubusercontent.com/u/13301570?v=4',
                'github' => 'https://github.com/Kreezag',
            ],
            [
                'name' => 'Artūrs Terehovičs',
                'role' => 'PHP developer',
                'avatar' => 'https://avatars.githubusercontent.com/u/94047334?v=4',
                'github' => 'https://github.com/lotyp',
            ],
        ], TeamResource::class);
}
}
