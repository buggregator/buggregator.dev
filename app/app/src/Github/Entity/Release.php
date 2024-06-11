<?php

declare(strict_types=1);

namespace App\Github\Entity;

final readonly class Release implements \JsonSerializable
{
    public function __construct(
        public string $repository,
        public string $version,
        public \DateTimeInterface $createdAt,
    ) {}

    public function jsonSerialize(): array
    {
        return [
            'repository' => $this->repository,
            'version' => $this->version,
            'createdAt' => $this->createdAt->format(\DateTimeInterface::ATOM),
        ];
    }
}
