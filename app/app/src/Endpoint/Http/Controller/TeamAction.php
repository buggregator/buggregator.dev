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
                'role' => 'Founder and Core Developer',
                'avatar' => 'https://avatars.githubusercontent.com/u/773481?v=4',
                'github' => 'https://github.com/butschster',
            ],
            [
                'name' => 'Aleksei Gagarin',
                'role' => 'Creator of Trap',
                'avatar' => 'https://avatars.githubusercontent.com/u/4152481?v=4',
                'github' => 'https://github.com/roxblnfk',
            ],
            [
                'name' => 'Andrey Kuchuk',
                'role' => 'Frontend Developer (UI & UX)',
                'avatar' => 'https://avatars.githubusercontent.com/u/13301570?v=4',
                'github' => 'https://github.com/Kreezag',
            ],
            [
                'name' => 'Dmitrii Derepko',
                'role' => 'IDE Plugin Developer',
                'avatar' => 'https://avatars.githubusercontent.com/u/6815714?&v=4',
                'github' => 'https://github.com/xepozz',
            ],
        ], TeamResource::class);
    }
}
