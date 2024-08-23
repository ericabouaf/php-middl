<?php

namespace Middl\Middleware;

use Middl\AbstractMiddleware;
use Middl\Request;
use Middl\Response;

class CallbackMiddleware extends AbstractMiddleware
{
    public function __construct(private readonly \Closure $closure)
    {
    }

    public function __invoke(Request $request, callable $next): Response
    {
        /** @var Response */
        return $this->closure->call($this, $request, $next);
    }
}
