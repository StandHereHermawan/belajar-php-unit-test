<?php

use AriefKarditya\TestSuitePhp\Helper\Counter;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Assert;

class IncompleteCounterTest extends TestCase
{
    static private Counter $counter;

    public static function setUpBeforeClass(): void
    {
        self::$counter = new Counter();
    }

    /**
     * @test
     */
    public function check()
    {
        Assert::assertEquals(0, self::$counter->getCounter());
        # TO DO call increment.
    }

    /**
     * @test
     */
    public function checkAgain()
    {
        Assert::assertEquals(0, self::$counter->getCounter());
        self::markTestIncomplete("TODO do increment"); # Kode dibawah setelah function mark test incomplete tidak dieksekusi karena kode throw exception.
        echo PHP_EOL . "TEST TEST" . PHP_EOL;
    }

    /**
     * @test
     */
    public function checkAgainAndAgain()
    {
        Assert::assertEquals(0, self::$counter->getCounter());
        echo PHP_EOL . "TEST TEST" . PHP_EOL;
        self::markTestIncomplete("TODO do increment");
    }

    /**
     * @test
     */
    public function checkAgainAndAgainAgain()
    {
        Assert::assertEquals(0, self::$counter->getCounter());
        echo PHP_EOL . "TEST TEST" . PHP_EOL;
        self::markTestIncomplete("TODO do increment");
    }
}
