<?php

declare(strict_types=1);

namespace App\Endpoint\Http\Controller;

use App\Application\Http\Response\ResourceInterface;
use App\Endpoint\Http\Resource\IssueCollection;
use App\Endpoint\Http\Resource\IssueResource;
use App\Github\ClientInterface;
use Spiral\Router\Annotation\Route;

final readonly class IssuesForContributorsAction
{
    #[Route(route: 'issues/for-contributors', name: 'issues-for-contributors', methods: ['GET'], group: 'api')]
    public function __invoke(ClientInterface $client): ResourceInterface
    {
        return new IssueCollection($client->getIssuesForContributors(), IssueResource::class);
    }
}
