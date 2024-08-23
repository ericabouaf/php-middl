<?php

namespace Middl;

use Symfony\Component\HttpFoundation\ParameterBag;

class Request
{
    public readonly ParameterBag $parameters;
    public function __construct(array $parameters = [])
    {
        $this->parameters = new ParameterBag($parameters);
    }
}
