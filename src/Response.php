<?php

namespace Middl;

use Symfony\Component\HttpFoundation\ParameterBag;

class Response
{
    public readonly ParameterBag $parameters;
    public readonly Request $request;

    private bool $isError = false;
    private ?string $errorMessage = null;

    public function __construct(Request $request, array $parameters = [])
    {
        $this->request = $request;
        $this->parameters = new ParameterBag($parameters);
    }

    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }

    public static function error(Request $request, string $errorMessage): self
    {
        $r = new self($request);
        $r->isError = true;
        $r->errorMessage = $errorMessage;
        return $r;
    }

    public function isError(): bool
    {
        return $this->isError;
    }

    public function copy(string $sourceParam, string $destParam): void
    {
        $this->parameters->set($destParam, $this->parameters->get($sourceParam));
    }
}
