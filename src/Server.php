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

namespace Sywlwl\UdpServer;

use Hyperf\Context\ApplicationContext;
use Hyperf\Contract\ConfigInterface;
use Hyperf\Dispatcher\AbstractDispatcher;
use Hyperf\Logger\LoggerFactory;
use Psr\Container\ContainerInterface;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Log\LoggerInterface;
use Sywlwl\BinTool\BIN;

class Server
{
    private LoggerInterface $logger;

    private int $count = 0;

    private AbstractDispatcher $dispatcher;


    public function __construct(ContainerInterface $container, private ConfigInterface $config)
    {
        $this->logger = $container->get(LoggerFactory::class)->get('udp-server');
        $config = $this->config->get('udp_server');
        $this->dispatcher = $container->get($config['dispatcher']);
    }

    public function onPacket(\Swoole\Http\Server $server, string $data, array $clientInfo): void
    {
        $this->dispatcher->dispatch($server, $data, $clientInfo);
    }
}
