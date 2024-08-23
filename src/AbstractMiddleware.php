<?php

namespace Middl;

use Psr\Log\LoggerAwareTrait;

abstract class AbstractMiddleware implements MiddlewareInterface
{
    use LoggerAwareTrait;

    public function __invoke(Request $request, callable $next): Response
    {
        return $next($request);
    }
}
