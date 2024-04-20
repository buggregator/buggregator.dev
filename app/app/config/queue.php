<?php

declare(strict_types=1);

use Spiral\RoadRunner\Jobs\Queue\MemoryCreateInfo;

return [
    'default' => env('QUEUE_CONNECTION', 'in-memory'),

    'aliases' => [],

    'connections' => [
        'in-memory' => [
            'driver' => 'roadrunner',
            'pipeline' => 'memory',
        ],
    ],

    'pipelines' => [
        'memory' => [
            'connector' => new MemoryCreateInfo('local'),
            'consume' => true,
        ],
    ],

    'defaultSerializer' => 'json',

    'registry' => [
        'handlers' => [],
        'serializers' => [],
    ],

    'interceptors' => [
        'push' => [],
        'consume' => [],
    ],
];
