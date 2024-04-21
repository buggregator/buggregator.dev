<?php

declare(strict_types=1);

namespace App\Github;

use Psr\SimpleCache\CacheInterface;

final readonly class CacheableClient implements ClientInterface
{
    public function __construct(
        private ClientInterface $client,
        private CacheInterface $cache,
        private int $ttl = 300,
    ) {
    }

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

    public function getLastVersion(string $repository): string
    {
        $cacheKey = $this->getCacheKey($repository, __METHOD__);
        if ($this->cache->has($cacheKey)) {
            return $this->cache->get($cacheKey);
        }

        $version = $this->client->getLastVersion($repository);

        $this->cache->set($cacheKey, $version, $this->ttl);

        return $version;
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
