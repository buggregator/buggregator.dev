<?php

declare(strict_types=1);

namespace App\Endpoint\Http\Controller;

use App\Github\ClientInterface;
use App\Github\Event\NewRelease;
use App\Github\Event\RepositoryStarred;
use App\Github\WebhookGate;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Http\Message\ResponseInterface;
use Spiral\Http\Request\InputManager;
use Spiral\Http\ResponseWrapper;
use Spiral\Router\Annotation\Route;

final readonly class GithubWebhookAction
{
    public function __construct(
        private EventDispatcherInterface $events,
    ) {
    }

    #[Route(route: 'github/webhook', name: 'github-webhook', methods: ['GET', 'POST'])]
    public function __invoke(
        InputManager $input,
        ResponseWrapper $response,
        WebhookGate $gate,
        ClientInterface $client,
    ): ResponseInterface {
        if (!$gate->validate((string)$input->request()->getBody(), $input->header('x-hub-signature-256'))) {
            // throw new ForbiddenException('Invalid signature');
        }

        $event = match ($input->header('x-github-event')) {
            'star' => $this->handleStar($input),
            'release' => $this->handleRelease($input),
            default => null,
        };

        if ($event !== null) {
            $client->clearCache($input->data('repository.full_name'));
            $this->events->dispatch($event);
        }

        return $response->create(200);
    }

    private function handleStar(InputManager $input): ?object
    {
        $action = $input->data('action');

        return match ($action) {
            'created' => new RepositoryStarred(
                repository: $input->data('repository.name'),
                stars: $input->data('repository.stargazers_count'),
            ),
            default => null,
        };
    }

    private function handleRelease(InputManager $input): ?object
    {
        $action = $input->data('action');

        return match ($action) {
            'published' => new NewRelease(
                repository: $input->data('repository.name'),
                version: $input->data('release.tag_name'),
            ),
            default => null,
        };
    }
}
