<?php

namespace Middl;

class CallbackMiddleware extends AbstractMiddleware
{
    public function __construct(private readonly \Closure $closure)
    {
    }

    public function __invoke(Request $request, callable $next): Response
    {
        return $this->closure->call($this, $request, $next);
    }
}
