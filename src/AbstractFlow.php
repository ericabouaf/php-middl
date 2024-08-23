<?php

namespace Middl;

use Psr\Log\LoggerInterface;

abstract class AbstractFlow implements FlowInterface
{
    public function __invoke(array $arguments, ?LoggerInterface $logger = null): Response
    {
        $request = new Request($arguments);
        $middlewares = $this->configureMiddlewares();
        return MiddlewareRunner::run($middlewares, $request, $logger);
    }

    /**
     * @return MiddlewareInterface[]
     */
    abstract protected function configureMiddlewares(): array;
}
