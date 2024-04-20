<?php

declare(strict_types=1);

return [
    'default' => env('CACHE_STORAGE', 'rr'),

    'aliases' => [],

    'storages' => [
        'rr' => [
            'type' => 'roadrunner',
            'driver' => 'local',
        ],
    ],
];
