<?php

namespace Middl;

use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

#[AutoconfigureTag('flow')]
interface FlowInterface
{
    public function __invoke(array $arguments, ?LoggerInterface $logger = null): Response;
}
