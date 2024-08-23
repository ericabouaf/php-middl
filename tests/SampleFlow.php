<?php

namespace Middl\Tests;

use Middl\AbstractFlow;
use Middl\Middleware\CallbackMiddleware;
use Middl\Middleware\DummyMiddleware;
use Middl\Request;
use Middl\Response;

class SampleFlow extends AbstractFlow
{
    protected function configureMiddlewares(): array
    {
        return [
            new DummyMiddleware('Eric'),

            new CallbackMiddleware(function (Request $request, callable $next) {
                /** @var Response $response */
                $response = $next($request);

                return $response;
            }),

            new SampleBeforeAfterMiddleware(),
            new SampleCustomMiddleware(),
        ];
    }
}
