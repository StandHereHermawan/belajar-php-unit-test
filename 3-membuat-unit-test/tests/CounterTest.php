<?php

namespace AriefKarditya\TryUnitTest;

use AriefKarditya\TryUnitTest\Counter;
use PHPUnit\Framework\TestCase;

class CounterTest extends TestCase
{
    public function testCounter()
    {
        $counter = new Counter();
        $counter->increment();
        echo PHP_EOL . $counter->getCounter() . PHP_EOL;
    }

    public function testOther()
    {
        $counter = new Counter();
        $counter->increment();
        echo PHP_EOL . $counter->getCounter() . " other." . PHP_EOL;
    }
}
