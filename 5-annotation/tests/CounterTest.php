<?php

namespace AriefKarditya\UsingAnnotationPhp;

use AriefKarditya\UsingAnnotationPhp\Counter;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class CounterTest extends TestCase
{
    /**
     * @test 
     */
    public function counter()
    {
        $counter = new Counter();
        $counter->increment();
        Assert::assertEquals(1, $counter->getCounter());
    }
}
