<?php

declare(strict_types=1);

namespace App\Github;

interface ClientInterface
{
    public function getStars(string $repository): int;

    public function getLastVersion(string $repository): string;
}
