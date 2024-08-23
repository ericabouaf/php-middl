<?php

namespace Middl\Bundle;

use Middl\FlowInterface;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Component\DependencyInjection\Attribute\AutowireLocator;

class FlowRegistry
{
    public function __construct(
        #[AutowireLocator('flow')]
        private readonly ContainerInterface            $flowContainer
    ) {
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function getFlow(string $flowClassname): FlowInterface
    {
        /** @var FlowInterface */
        return $this->flowContainer->get($flowClassname);
    }
}