<?php

namespace AriefKarditya\TestSuitePhp\Math;

use AriefKarditya\TestSuitePhp\Helper\Math;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Assert;

class MathTest extends TestCase
{
    /**
     * @test
     */
    public function manual() # Unit Test Manual
    {
        Assert::assertEquals(10, Math::sum([5, 5]));
        Assert::assertEquals(20, Math::sum([4, 4, 4, 4, 4]));
        Assert::assertEquals(9, Math::sum([3, 3, 3]));
        Assert::assertEquals(0, Math::sum([]));
        Assert::assertEquals(2, Math::sum([2]));
    }

    public function mathSumData(): array
    {
        return [
            [[5, 5], 10],
            [[4, 4, 4, 4, 4], 20],
            [[3, 3, 3], 9],
            [[], 0],
            [[2], 2]
        ];
    }

    /**
     * @dataProvider mathSumData
     */
    public function testDataProvider(array $values, int $expected)
    {
        Assert::assertEquals($expected, Math::sum($values));
    }

    /**
     * @test
     * @dataProvider mathSumData
     */
    public function dataProvider(array $values, int $expected)
    {
        Assert::assertEquals($expected, Math::sum($values));
    }

    /**
     * @testWith    [[5, 5], 10]
     *              [[4, 4, 4, 4, 4], 20]
     *              [[3, 3, 3], 9]
     *              [[], 0]
     *              [[2], 2]
     */
    public function testWith(array $values, int $expected)
    {
        Assert::assertEquals($expected, Math::sum($values));
    }
}
