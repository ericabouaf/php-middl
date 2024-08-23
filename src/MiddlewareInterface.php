<?php

namespace Middl;

use Psr\Log\LoggerAwareInterface;

interface MiddlewareInterface extends LoggerAwareInterface
{
    public function __invoke(Request $request, callable $next): Response;
}
