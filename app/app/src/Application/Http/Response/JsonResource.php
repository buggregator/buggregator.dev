<?php

declare(strict_types=1);

namespace App\Application\Http\Response;

use JsonSerializable;
use Psr\Http\Message\ResponseInterface;

class JsonResource implements ResourceInterface
{
    use JsonTrait;

    protected readonly mixed $data;
    protected array $headers = [];

    public function __construct(mixed $data = [])
    {
        $this->data = $data;
    }

    protected function mapData(): array|JsonSerializable
    {
        return $this->data;
    }

    protected function getCode(): int
    {
        return 200;
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
        return $data;
    }

    public function jsonSerialize(): array
    {
        $data = $this->mapData();

        if ($data instanceof JsonSerializable) {
            $data = $data->jsonSerialize();
        }

        foreach ($data as $key => $value) {
            if ($value instanceof ResourceInterface) {
                $data[$key] = $value->jsonSerialize();
            }
        }

        return $this->wrapData($data);
    }

    public function withHeaders(array $headers): self
    {
        $self = clone $this;
        $self->headers = $headers;

        return $self;
    }
}
