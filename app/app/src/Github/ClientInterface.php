<?php

declare(strict_types=1);

namespace App\Github;

use App\Github\Entity\Issue;

interface ClientInterface
{
    public function getStars(string $repository): int;

    public function getLastVersion(string $repository): string;

    /**
     * @return Issue[]
     */
    public function getIssuesForContributors(): array;
}
