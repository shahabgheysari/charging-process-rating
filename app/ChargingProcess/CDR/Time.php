<?php

namespace App\ChargingProcess\CDR;

class Time
{

    private int $seconds;

    public function __construct(int $seconds)
    {
        $this->seconds = $seconds;
    }

    /**
     * @return int
     */
    public function getSeconds(): int
    {
        return $this->seconds;
    }
}
