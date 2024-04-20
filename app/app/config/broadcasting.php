<?php

declare(strict_types=1);

use Spiral\Broadcasting\Driver\NullBroadcast;

return [
    'default' => env('BROADCAST_CONNECTION', 'centrifugo'),
    'aliases' => [],
    'connections' => [
        'centrifugo' => [
            'driver' => 'centrifugo',
        ],
        'null' => [
            'driver' => NullBroadcast::class,
        ],
    ],
];
