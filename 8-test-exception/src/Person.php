<?php

namespace AriefKarditya\TestExceptionPhp;

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
}
