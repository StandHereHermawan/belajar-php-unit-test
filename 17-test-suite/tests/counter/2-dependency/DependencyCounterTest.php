<?php

use AriefKarditya\TestSuitePhp\Helper\Counter;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class DependencyCounterTest extends TestCase
{

    /**
     * @test
     */
    public function increment()
    {
        $counter = new Counter();
        $counter->increment();
        $this->assertEquals(1, $counter->getCounter());
    }

    public function testFirst(): Counter
    {
        $counter = new Counter();
        $counter->increment();
        Assert::assertEquals(1, $counter->getCounter());
        return $counter;
    }

    /**
     * @depends testFirst
     */
    public function testSecond(Counter $counter)
    {
        $counter->increment();
        $this->assertEquals(2, $counter->getCounter());
    }
}
