<?php

declare(strict_types=1);

namespace App\Endpoint\Http\Controller;

use App\Application\Event\Liked;
use App\Application\Http\Response\ResourceInterface;
use App\Endpoint\Http\Filter\LikeRequest;
use App\Endpoint\Http\Resource\IssueCollection;
use App\Endpoint\Http\Resource\IssueResource;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Http\Message\ResponseInterface;
use Spiral\Http\ResponseWrapper;
use Spiral\Router\Annotation\Route;

final readonly class LikeAction
{
    public function __construct(
        private EventDispatcherInterface $events,
        private ResponseWrapper $response,
    ) {
    }

    #[Route(route: 'like', name: 'like', methods: ['POST'], group: 'api')]
    public function __invoke(LikeRequest $request): ResponseInterface
    {
        $this->events->dispatch(new Liked(key: $request->key));

        return $this->response->create(200);
    }
}
