<?php

declare(strict_types=1);

namespace App\Application\Http\Response;

use Spiral\Filters\Exception\ValidationException;

/**
 * @property-read ValidationException $data
 */
final class ValidationResource extends JsonResource
{
    public function __construct(ValidationException $data)
    {
        parent::__construct($data);
    }

    protected function getCode(): int
    {
        return $this->data->getCode();
    }

    protected function mapData(): array|\JsonSerializable
    {
        return [
            'message' => 'validation_errors',
            'code' => $this->data->getCode(),
            'errors' => $this->data->errors,
        ];
    }
}
