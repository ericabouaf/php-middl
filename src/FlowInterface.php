<?php

namespace Middl;

use Psr\Log\LoggerInterface;

interface FlowInterface
{
    public function __invoke(array $arguments, ?LoggerInterface $logger = null): Response;
}
