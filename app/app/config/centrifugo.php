<?php

declare(strict_types=1);

use App\Endpoint\Centrifugo\ConnectService;
use App\Endpoint\Centrifugo\RPCService;
use RoadRunner\Centrifugo\Request\RequestType;

return [
    'services' => [
        RequestType::Connect->value => ConnectService::class,
        RequestType::RPC->value => RPCService::class,
    ],
    'interceptors' => [
        '*' => [],
    ],
];
