<?php

declare(strict_types=1);

namespace App\Github;

use App\Github\Entity\Release;
use Psr\SimpleCache\CacheInterface;

final readonly class CacheableClient implements ClientInterface
{
    public function __construct(
        private ClientInterface $client,
        private CacheInterface $cache,
        private int $ttl = 300,
    ) {}

    public function getStars(string $repository): int
    {
        $cacheKey = $this->getCacheKey($repository, __METHOD__);
        if ($this->cache->has($cacheKey)) {
            return $this->cache->get($cacheKey);
        }

        $stars = $this->client->getStars($repository);

        $this->cache->set($cacheKey, $stars, $this->ttl);

        return $stars;
    }

    public function getLatestRelease(string $repository): Release
    {
        $cacheKey = $this->getCacheKey($repository, __METHOD__);
        if ($this->cache->has($cacheKey)) {
            return $this->cache->get($cacheKey);
        }

        $release = $this->client->getLatestRelease($repository);

        $this->cache->set($cacheKey, $release, $this->ttl);

        return $release;
    }

    public function getIssuesForContributors(): array
    {
        $cacheKey = $this->getCacheKey('issues', __METHOD__);
        if ($this->cache->has($cacheKey)) {
            return $this->cache->get($cacheKey);
        }

        $issues = $this->client->getIssuesForContributors();
        $this->cache->set($cacheKey, $issues, $this->ttl);

        return $issues;
    }

    public function clearCache(): void
    {
        $this->cache->clear();
    }

    private function getCacheKey(string $repository, string $prefix): string
    {
        return "{$prefix}:{$repository}";
    }
}
