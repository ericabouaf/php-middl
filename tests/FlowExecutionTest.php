<?php

namespace Middl\Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;

class FlowExecutionTest extends TestCase
{
    #[Test]
    public function testFlowExecution(): void
    {
        $logger = new NullLogger();
        $flow = new SampleFlow();

        $response = ($flow)([
            'foo' => 'bar'
        ], $logger);

        $this->assertEquals([
            'Eric' => 'some output value',
            'test' => null,
        ], $response->parameters->all());
    }
}
