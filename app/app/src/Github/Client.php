<?php

declare(strict_types=1);

namespace App\Github;

use App\Github\Entity\Issue;
use Carbon\Carbon;
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
                method: 'GET',
                uri: "repos/{$repository}",
            ),
        );

        $data = \json_decode($response->getBody()->getContents(), true);

        return $data['stargazers_count'];
    }

    public function getLastVersion(string $repository): string
    {
        $response = $this->client->sendRequest(
            new Request(
                method: 'GET',
                uri: "repos/{$repository}/releases/latest",
            ),
        );

        $data = \json_decode($response->getBody()->getContents(), true);

        return $data['tag_name'];
    }

    public function getIssuesForContributors(): array
    {
        $repositories = [
            'buggregator/server',
            'buggregator/trap',
            'buggregator/frontend',
            'buggregator/docs',
            'buggregator/phpstorm-plugin',
        ];

        $issues = [];

        foreach ($repositories as $repository) {
            $issues = [...$issues, ...$this->fetchRepositoryIssues($repository)];
        }

        return $issues;
    }

    private function fetchRepositoryIssues(string $repository): array
    {
        $response = $this->client->sendRequest(
            new Request(
                method: 'GET',
                uri: "repos/{$repository}/issues?labels=for%20contributors&assignee=none",
            ),
        );

        $data = \json_decode($response->getBody()->getContents(), true);

        return \array_map(
            static fn(array $issue): Issue => new Issue(
                repository: $repository,
                title: $issue['title'],
                labels: \array_map(static fn(array $label) => $label['name'], $issue['labels']),
                url: $issue['html_url'],
                createdAt: Carbon::createFromFormat('Y-m-d\TH:i:s\Z', $issue['created_at']),
            ),
            $data,
        );
    }
}
