<?php

declare(strict_types=1);

namespace App\Github\Entity;

final readonly class Issue implements \JsonSerializable
{
    /**
     * @param non-empty-string $title
     * @param non-empty-string[] $labels
     * @param non-empty-string $url
     */
    public function __construct(
        public string $repository,
        public string $title,
        public array $labels,
        public string $url,
        public \DateTimeInterface $createdAt,
    ) {
    }

    public function jsonSerialize(): array
    {
        return [
            'repository' => $this->repository,
            'title' => $this->title,
            'labels' => $this->labels,
            'url' => $this->url,
            'createdAt' => $this->createdAt->format(\DateTimeInterface::ATOM),
        ];
    }
}
