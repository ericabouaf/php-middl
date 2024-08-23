<?php

namespace Middl\Middleware;

use Middl\AbstractMiddleware;
use Middl\Request;
use Middl\Response;

class DummyMiddleware extends AbstractMiddleware
{
    public function __construct(private readonly string $name)
    {
    }

    public function __invoke(Request $request, callable $next): Response
    {
        $this->logger?->info("Dummy middleware '" . $this->name . "' before next");
        $request->parameters->set($this->name, 'was here');

        $response = $next($request);

        $this->logger?->info("Dummy middleware '" . $this->name . "' after next");
        $response->parameters->set($this->name, 'some output value');

        return $response;
    }
}
