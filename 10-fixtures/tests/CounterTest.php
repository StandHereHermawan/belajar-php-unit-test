<?php

namespace AriefKarditya\FixturesPhp;

use AriefKarditya\FixturesPhp\Counter;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Assert;

class CounterTest extends TestCase
{
    private Counter $counter;

    protected function tearDown(): void
    {
        echo PHP_EOL . "tear down" . PHP_EOL;
    }

    /**
     * @after
     */
    protected function after()
    {
        echo "after" . PHP_EOL;
    }

    public function setUp(): void # Fixture
    {
        $this->counter = new Counter();
        echo "setup counter";
    }

    public function testCounter() # Fixture
    {
        $this->counter->increment();
        Assert::assertEquals(1, $this->counter->getCounter());
    }
}
