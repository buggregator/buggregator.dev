<?php

declare(strict_types=1);

namespace App\Github;

use GuzzleHttp\Psr7\Request;
use Psr\SimpleCache\CacheInterface;
use Spiral\Cache\CacheStorageProviderInterface;

final readonly class Client implements \App\Github\ClientInterface
{
    private CacheInterface $cache;

    public function __construct(
        private \Psr\Http\Client\ClientInterface $client,
        CacheStorageProviderInterface $cache,
    ) {
        $this->cache = $cache->storage('github');
    }

    public function getStars(string $repository): int
    {
        $cacheKey = $this->getCacheKey($repository, __METHOD__);
        if ($this->cache->has($cacheKey)) {
            return $this->cache->get($cacheKey);
        }

        $response = $this->client->sendRequest(
            new Request(
                'GET',
                "repos/{$repository}",
            ),
        );

        $data = \json_decode($response->getBody()->getContents(), true);
        $this->cache->set($cacheKey, $data['stargazers_count']);

        return $data['stargazers_count'];
    }

    public function getLastVersion(string $repository): string
    {
        $cacheKey = $this->getCacheKey($repository, __METHOD__);
        if ($this->cache->has($cacheKey)) {
            return $this->cache->get($cacheKey);
        }

        $response = $this->client->sendRequest(
            new Request(
                'GET',
                "repos/{$repository}/releases/latest",
            ),
        );

        $data = \json_decode($response->getBody()->getContents(), true);
        $this->cache->set($cacheKey, $data['tag_name']);

        return $data['tag_name'];
    }

    private function getCacheKey(string $repository, string $prefix): string
    {
        return "{$prefix}:{$repository}";
    }

    public function clearCache(string $repository): void
    {
        $refl = new \ReflectionClass($this);
        foreach ($refl->getMethods() as $method) {
            if ($method->isPublic()) {
                $this->cache->delete($this->getCacheKey($repository, $method->getName()));
            }
        }
    }
}