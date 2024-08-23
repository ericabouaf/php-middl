<?php

namespace Middl;

use Symfony\Component\HttpFoundation\ParameterBag;

class Response
{
    public readonly ParameterBag $parameters;
    public readonly Request $request;

    public function __construct(Request $request, array $parameters = [])
    {
        $this->request = $request;
        $this->parameters = new ParameterBag($parameters);
    }

    public function copy(string $sourceParam, string $destParam): void
    {
        $this->parameters->set($destParam, $this->parameters->get($sourceParam));
    }
}
