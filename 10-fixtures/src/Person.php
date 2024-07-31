<?php

namespace AriefKarditya\FixturesPhp;

class Person
{
    public function __construct(private string $name)
    {
        # constructor
    }

    public function sayHello(?string $name): string
    {
        if ($name == null) throw new \Exception("Name is null. Name cannot null.");
        if (trim($name) == "") throw new \Exception("Name is Blank. Name Cannot Blank");
        return "Hi $name! my name is $this->name";
    }

    public function sayGoodBye(?string $name): void
    {
        if ($name == null) throw new \Exception("Name is null. Name cannot null.");
        if (trim($name) == "") throw new \Exception("Name is Blank. Name Cannot Blank");
        echo "Good bye $name! from $this->name." . PHP_EOL;
    }
}
