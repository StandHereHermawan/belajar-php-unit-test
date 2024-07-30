<?php

namespace AriefKarditya\TestDependency;

class Counter
{
    private int $counter = 0;

    public function increment()
    {
        $this->counter++;
    }

    public function getCounter()
    {
        return $this->counter;
    }
}
