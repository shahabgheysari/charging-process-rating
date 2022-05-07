<?php

namespace App\ChargingProcessRating\Calculator;

use App\ChargingProcessRating\Money;

class OverallAmount
{

    private Money $overall;
    private int $precision = 2;

    public function __construct(Money $overall)
    {
        $this->overall = $overall;
    }

    /**
     * @return Money
     */
    public function getOverall(): Money
    {
        return new Money($this->overall->getAmount(), $this->precision);
    }


}
