<?php

declare(strict_types=1);

namespace App\Github;

final readonly class WebhookGate
{
    public function __construct(
        private string $secret,
    ) {
    }

    public function validate(string $payload, string $signature): bool
    {
        return \hash_equals(
            \hash_hmac('sha256', $payload, $this->secret),
            \substr($signature, 7),
        );
    }
}
