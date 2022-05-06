<?php

namespace App\ChargingProcess\CDR;

class Transaction
{

    private int $value;

    public function __construct(int $value = 1)
    {
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

}
