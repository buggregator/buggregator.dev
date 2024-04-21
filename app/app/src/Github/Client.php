<?php

declare(strict_types=1);

namespace App\Github;

use GuzzleHttp\Psr7\Request;

final readonly class Client implements ClientInterface
{
    public function __construct(
        private \Psr\Http\Client\ClientInterface $client,
    ) {
    }

    public function getStars(string $repository): int
    {
        $response = $this->client->sendRequest(
            new Request(
                'GET',
                "repos/{$repository}",
            ),
        );

        $data = \json_decode($response->getBody()->getContents(), true);

        return $data['stargazers_count'];
    }

    public function getLastVersion(string $repository): string
    {
        $response = $this->client->sendRequest(
            new Request(
                'GET',
                "repos/{$repository}/releases/latest",
            ),
        );

        $data = \json_decode($response->getBody()->getContents(), true);

        return $data['tag_name'];
    }
}
