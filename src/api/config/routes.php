<?php

return [
    [
        'verb' => [],
        'pattern' => '/',
        'route' => 'default/index',
    ],
    [
        'verb' => ['post'],
        'pattern' => '/requests',
        'route' => 'order/requests',
    ],
    [
        'verb' => ['get'],
        'pattern' => '/processor',
        'route' => 'order-delay/processor',
    ],
];
