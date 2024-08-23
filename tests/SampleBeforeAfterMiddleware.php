<?php

namespace Middl\Tests;

use Middl\Middleware\BeforeAfterMiddleware;
use Middl\Request;
use Middl\Response;

class SampleBeforeAfterMiddleware extends BeforeAfterMiddleware
{
    public function before(Request $request): void
    {
        //return $request;
    }

    public function after(Request $request, Response $response): Response
    {
        $response->copy('Eric', 'test');
        return $response;
    }
}
