<?php

declare(strict_types=1);

namespace App\Application\Http\Response;

use Spiral\Http\Exception\ClientException;
use Spiral\RoadRunner\GRPC\Exception as GRPC;

/**
 * @property-read \Throwable $data
 */
final class ErrorResource extends JsonResource
{
    public function __construct(\Throwable $data)
    {
        parent::__construct($data);
    }

    protected function mapData(): array|\JsonSerializable
    {
        return [
            'message' => $this->data->getMessage(),
            'code' => $this->getCode(),
        ];
    }

    protected function getCode(): int
    {
        return match (true) {
            $this->data instanceof ClientException => $this->data->getCode(),
            $this->data instanceof GRPC\UnauthenticatedException => 401,
            default => 500,
        };
    }
}
