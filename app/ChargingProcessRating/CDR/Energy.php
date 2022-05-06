<?php

namespace App\ChargingProcessRating\CDR;

class Energy
{

    private float $amount;

    public function __construct(float $amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }


}
