<?php

declare(strict_types=1);

namespace App\Github\Event;

use App\Application\Broadcasting\Channel\EventsChannel;
use App\Application\Broadcasting\ShouldBroadcastInterface;
use Stringable;

final readonly class NewRelease implements ShouldBroadcastInterface
{
    public function __construct(
        public string $repository,
        public string $version,
    ) {
    }

    public function getEventName(): string
    {
        return 'repository.release';
    }

    public function getBroadcastTopics(): iterable|Stringable
    {
        return new EventsChannel();
    }

    public function jsonSerialize(): array
    {
        return [
            'repository' => $this->repository,
            'version' => $this->version,
        ];
    }
}
