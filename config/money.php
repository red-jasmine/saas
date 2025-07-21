<?php

return [
    /*
     |--------------------------------------------------------------------------
     | Laravel money
     |--------------------------------------------------------------------------
     */
    'locale'            => config('app.locale', 'en_US'),
    'defaultCurrency'   => config('app.currency', 'CNY'),
    'defaultFormatter'  => null,
    'defaultSerializer' => null,
    'currencies'        => [
        'iso'     => ['CNY', 'USD', 'EUR'], //    'all' 选择全部
        'bitcoin' => ['XBT'], //    'false' 不支持
        // 自定义货币
        'custom'  => [
            'JFM' => [
                'name'                => '积分',
                'code'                => 901,
                'minorUnit'           => 0,
                'subunit'             => 100,
                'symbol'              => '',
                'symbol_first'        => true,
                'decimal_mark'        => '.',
                'thousands_separator' => ',',
            ],
        ],
    ],
];
