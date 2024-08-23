<?php

namespace Middl\Middleware;

use Middl\AbstractMiddleware;
use Middl\Request;
use Middl\Response;

abstract class BeforeAfterMiddleware extends AbstractMiddleware
{
    public function __invoke(Request $request, callable $next): Response
    {
        $this->before($request);

        $response = $next($request);

        return $this->after($request, $response);
    }

    abstract public function before(Request $request): void;
    abstract public function after(Request $request, Response $response): Response;
}
