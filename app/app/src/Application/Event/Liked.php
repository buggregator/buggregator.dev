<?php

declare(strict_types=1);

namespace App\Application\Event;

use App\Application\Broadcasting\Channel\EventsChannel;
use App\Application\Broadcasting\ShouldBroadcastInterface;
use Stringable;

final readonly class Liked implements ShouldBroadcastInterface
{
    public function __construct(
        public string $key,
    ) {
    }

    public function getEventName(): string
    {
        return 'liked';
    }

    public function getBroadcastTopics(): iterable|Stringable
    {
        return new EventsChannel();
    }

    public function jsonSerialize(): array
    {
        return [
            'key' => $this->key,
        ];
    }
}
