<?php

use AriefKarditya\SharingFixturesPhp\Counter;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Assert;

class CounterTest extends TestCase
{
    static private Counter $counter;

    public static function setUpBeforeClass(): void
    {
        self::$counter = new Counter();
        echo PHP_EOL . "Set Up Before class" . PHP_EOL;
    }

    /**
     * @before
     */
    public function sample()
    {
        echo PHP_EOL . "Set Up annotation." . PHP_EOL;
    }

    /**
     * @test
     */
    public function first()
    {
        self::$counter->increment();
        Assert::assertEquals(1, self::$counter->getCounter());
    }

    /**
     * @test
     */
    public function second()
    {
        self::$counter->increment();
        Assert::assertEquals(2, self::$counter->getCounter());
    }

    /**
     * @test
     */
    public function third()
    {
        self::$counter->increment();
        Assert::assertEquals(3, self::$counter->getCounter());
    }

    public static function tearDownAfterClass(): void
    {
        echo PHP_EOL . "Tear Down" . PHP_EOL;
        echo "Unit Test Selesai" . PHP_EOL;
    }
}
