<?php

namespace Middl\Tests;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class FlowExecutionTest extends TestCase
{
    #[Test]
    public function testFlowExecution(): void
    {
        $flow = new SampleFlow();

        $response = ($flow)([
            'foo' => 'bar'
        ]);

        $this->assertEquals([
            //'foo' => 'bar'
        ], $response->parameters->all());
    }
}
