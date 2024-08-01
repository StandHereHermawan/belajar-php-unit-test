<?php

use AriefKarditya\TestSuitePhp\Helper\Counter;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Assert;

class SkippedCounterTest extends TestCase # From 13-Skip-Test
{
    static private Counter $counter;

    public static function setUpBeforeClass(): void
    {
        self::$counter = new Counter();
    }

    /**
     * @test
     */
    public function increment() # Tanpa skip unit test
    {
        Assert::assertEquals(0, self::$counter->getCounter());
        self::$counter->increment();
        Assert::assertEquals(1, self::$counter->getCounter());
    }

    /**
     * @test
     */
    public function incrementAgain()
    {
        self::markTestSkipped("Skip Unit Test"); # Kode dibawah function ini tidak akan dieksekusi.

        Assert::assertEquals(0, self::$counter->getCounter());
        self::$counter->increment();
        Assert::assertEquals(1, self::$counter->getCounter());
    }

    /**
     * @requires OSFAMILY Windows
     */
    public function testOnlyWindows() # Skip berdasarkan kondisi.
    {
        Assert::assertTrue(true, "Only In Windows");
        echo PHP_EOL . "Only In Windows" . PHP_EOL;
    }

    /**
     * @requires PHP >= 8
     * @requires OSFAMILY Linux
     */
    public function testPHP8() # Skip berdasarkan kondisi.
    {
        Assert::assertTrue(true, "Only In Ubuntu");
        echo PHP_EOL . "Only In Ubuntu" . PHP_EOL;
    }

    /**
     * @requires PHP < 8
     */
    public function testdibawahPHP8() # Skip berdasarkan kondisi.
    {
        Assert::assertTrue(true, "Only In PHP 8 Kebawah");
        echo PHP_EOL . "Only In PHP 8 Kebawah" . PHP_EOL;
    }
}
