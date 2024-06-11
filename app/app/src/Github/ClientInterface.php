<?php

declare(strict_types=1);

namespace App\Github;

use App\Github\Entity\Issue;
use App\Github\Entity\Release;

interface ClientInterface
{
    public function getStars(string $repository): int;

    public function getLatestRelease(string $repository): Release;

    /**
     * @return Issue[]
     */
    public function getIssuesForContributors(): array;
}
