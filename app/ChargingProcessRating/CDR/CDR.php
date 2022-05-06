<?php

namespace App\ChargingProcessRating\CDR;

class CDR
{

    private Energy $energy;
    private Time $time;
    private Transaction $transaction;

    public function __construct(Energy $energy, Time $time, Transaction $transaction)
    {
        $this->energy = $energy;
        $this->time = $time;
        $this->transaction = $transaction;
    }

    /**
     * @return Energy
     */
    public function getEnergy(): Energy
    {
        return $this->energy;
    }

    /**
     * @return Time
     */
    public function getTime(): Time
    {
        return $this->time;
    }

    /**
     * @return Transaction
     */
    public function getTransaction(): Transaction
    {
        return $this->transaction;
    }

}
