<?php

namespace Middl;

use Psr\Log\LoggerInterface;

abstract class MiddlewareRunner
{
    /**
     * @param MiddlewareInterface[] $middlewares
     */
    public static function run(array $middlewares, Request $request, ?LoggerInterface $logger = null): Response
    {
        $action = fn(Request $request): Response => new Response($request);

        foreach (array_reverse($middlewares) as $middleware) {
            if ($logger !== null) {
                $middleware->setLogger($logger);
            }
            $action = fn(Request $request): Response => $middleware($request, $action);
        }

        return $action($request);
    }
}
