<?php

namespace App\ChargingProcessRating;

class Rate
{

    private Money $energy;
    private Money $time;
    private Money $transaction;

    public function __construct(Money $energy, Money $time, Money $transaction)
    {
        $this->energy = $energy;
        $this->time = $time;
        $this->transaction = $transaction;
    }

    /**
     * @return Money
     */
    public function getEnergy(): Money
    {
        return $this->energy;
    }

    /**
     * @return Money
     */
    public function getTime(): Money
    {
        return $this->time;
    }

    /**
     * @return Money
     */
    public function getTransaction(): Money
    {
        return $this->transaction;
    }

}
