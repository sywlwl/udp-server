<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
return [
    'dispatcher' => \App\Udp\Dispatcher::class,
//    'timeout' => 30,
//    'clientChannel' => [
//        'identifier' => 'client',
//        'size' => 10000 * 45,
//        'columns' => [
//            ['info', \Swoole\Table::TYPE_STRING, 200],
//        ],
//    ],
];
