<?php

declare(strict_types=1);

namespace App\Github;

final readonly class WebhookGate
{
    public function __construct(
        private ?string $secret = null,
    ) {
    }

    public function validate(string $payload, string $signature): bool
    {
        if (!$this->secret) {
            return true;
        }

        return \hash_equals(
            \hash_hmac('sha256', $payload, $this->secret),
            \substr($signature, 7),
        );
    }
}
