<?php

namespace AriefKarditya\FixturesPhp;

use AriefKarditya\FixturesPhp\Person;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Assert;

class PersonTest extends TestCase
{
    private Person $person;

    /**
     * @before
     */
    protected function createPerson(): void # setUp, dieksekusi duluan sebelum semua unit test.
    {
        $this->person = new Person("Terry");
        echo PHP_EOL . "Before" . PHP_EOL;
    }

    /**
     * @test
     */
    public function helloSuccess()
    {
        Assert::assertEquals("Hi Andrew! my name is Terry", $this->person->sayHello("Andrew"));
    }

    /**
     * @test
     */
    public function helloSuccessAgain()
    {
        Assert::assertEquals("Hi Andrew! my name is Terry", $this->person->sayHello("Andrew"));
    }

    protected function tearDown(): void # Tear Down Function.
    {
        echo "tear down" . PHP_EOL;
    }

    /**
     * @after
     */
    protected function destroyPersonObject()
    {
        unset($this->person);
        echo "After" . PHP_EOL;
    }
}
