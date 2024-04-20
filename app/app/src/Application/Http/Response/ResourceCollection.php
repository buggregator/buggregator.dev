<?php

declare(strict_types=1);

namespace App\Application\Http\Response;

use Psr\Http\Message\ResponseInterface;

class ResourceCollection implements ResourceInterface
{
    use JsonTrait;

    private readonly array $args;
    protected array $headers = [];

    /**
     * @param class-string<ResourceInterface>|\Closure $resource
     */
    public function __construct(
        protected readonly iterable $data,
        protected string|\Closure $resource = JsonResource::class,
        mixed ...$args
    ) {
        $this->args = $args;
    }

    protected function getCode(): int
    {
        return 200;
    }

    /**
     * @return class-string<ResourceInterface>|\Closure
     */
    protected function getResource(): string|\Closure
    {
        return $this->resource;
    }

    /**
     * @return iterable<non-empty-string, mixed>
     */
    protected function getData(): iterable
    {
        return $this->data;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        $resource = $this->getResource();

        if (\is_string($resource)) {
            $resource = static fn(mixed $row, mixed ...$args): ResourceInterface => new $resource($row, ...$args);
        }

        foreach ($this->getData() as $key => $row) {
            $data[$key] = $resource($row, ...$this->args);
        }

        return $this->wrapData($data);
    }

    public function toResponse(ResponseInterface $response): ResponseInterface
    {
        $response = $this->writeJson($response, $this, $this->getCode());

        foreach ($this->headers as $name => $value) {
            $response = $response->withHeader($name, $value);
        }

        return $response;
    }

    protected function wrapData(array $data): array
    {
        return [
            'data' => $data,
        ];
    }

    public function withHeaders(array $headers): self
    {
        $self = clone $this;
        $self->headers = $headers;

        return $self;
    }
}
