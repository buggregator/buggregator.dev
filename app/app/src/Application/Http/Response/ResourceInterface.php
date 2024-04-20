<?php

declare(strict_types=1);

namespace App\Application\Http\Response;

use Psr\Http\Message\ResponseInterface;

interface ResourceInterface extends \JsonSerializable
{
    public function toResponse(ResponseInterface $response): ResponseInterface;

    public function withHeaders(array $headers): self;
}
