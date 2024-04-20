<?php

declare(strict_types=1);

return [
    'default' => env('CACHE_STORAGE', 'rr'),

    'aliases' => [
        'github' => 'rr',
    ],

    'storages' => [
        'rr' => [
            'type' => 'roadrunner',
            'driver' => 'local',
        ],
    ],
];
