<?php

return [

    /**
     * require pay/rate
     */
    'downloaded_minimum' => 1000,

    /**
     * rate must sort by hight to low require
     */
    'rate' => [
        'VIP User' => [
            'require_downloaded' => 75000,
            'rate_payment' => 30000
        ],
        'Premium User' => [
            'require_downloaded' => 25000,
            'rate_payment' => 25000
        ],
        'Trusted User' => [
            'require_downloaded' => 10000,
            'rate_payment' => 20000
        ],
        'Sfile User' => [
            'require_downloaded' => 5000,
            'rate_payment' => 17000
        ],
        'New User' => [
            'require_downloaded' => 0,
            'rate_payment' => 15000
        ],
    ],
];
