<?php

use AriefKarditya\TestSuitePhp\Entity\Person;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Assert;

class ExceptionPersonTest extends TestCase # from 8-test-exception
{
    /**
     * @test
     */
    public function person() # Skenario Sukses
    {
        $person = new Person("Terry");
        Assert::assertEquals("Hi Andrew! my name is Terry", $person->sayHello("Andrew"));
    }

    /**
     * @test
     */
    public function exceptionOne()
    {
        $person = new Person("Davis");
        $this->expectException(\Exception::class);
        $person->sayHello(null);
    }

    /**
     * @test
     */
    public function exceptionTwo()
    {
        $person = new Person("Davis");
        $this->expectException(\Exception::class);
        $person->sayHello("        ");
    }
}
