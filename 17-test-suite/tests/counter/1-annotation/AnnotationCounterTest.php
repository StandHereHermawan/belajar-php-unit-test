<?php

use AriefKarditya\TestSuitePhp\Helper\Counter;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class AnnotationCounterTest extends TestCase
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
