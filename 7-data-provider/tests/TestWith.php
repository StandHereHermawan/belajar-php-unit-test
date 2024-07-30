<?php

namespace AriefKarditya\DataProviderPhp;

use AriefKarditya\DataProviderPhp\Math;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Assert;

class testWith extends TestCase
{
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
