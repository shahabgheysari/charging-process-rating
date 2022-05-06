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

    /**
     * converts the seconds to hours
     * @return float|int
     */
    public function toHours(): float|int
    {
        return $this->seconds / 3600;
    }
}
