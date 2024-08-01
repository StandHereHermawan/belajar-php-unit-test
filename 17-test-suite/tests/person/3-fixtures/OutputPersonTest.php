<?php

use AriefKarditya\TestSuitePhp\Entity\Person;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Assert;

class OutputPersonTest extends TestCase # from 9-test-output
{
    /**
     * @test
     */
    public function hello() # Skenario Sukses
    {
        $person = new Person("Terry");
        Assert::assertEquals("Hi Andrew! my name is Terry", $person->sayHello("Andrew"));
    }

    /**
     * @test
     */
    public function output() # Test Output
    {
        $person = new Person("Davis");
        $this->expectOutputString("Good bye Terry! from Davis." . PHP_EOL);
        $person->sayGoodBye("Terry");
    }

    /**
     * @test
     */
    public function exceptionGoodByeNull()
    {
        $person = new Person("Davis");
        $this->expectException(\Exception::class);
        $person->sayGoodBye(null);
    }

    /**
     * @test
     */
    public function exceptionGoodByeBlank()
    {
        $person = new Person("Davis");
        $this->expectException(\Exception::class);
        $person->sayGoodBye("      ");
    }

    /**
     * @test
     */
    public function exceptionHelloNull()
    {
        $person = new Person("Davis");
        $this->expectException(\Exception::class);
        $person->sayHello(null);
    }

    /**
     * @test
     */
    public function exceptionHelloBlank()
    {
        $person = new Person("Davis");
        $this->expectException(\Exception::class);
        $person->sayHello("        ");
    }
}
