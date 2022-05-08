<?php

namespace App\ChargingProcessRating\Service;

class OutputModel
{
    private string $overall;
    private string $timeCost;
    private string $energyCost;
    private string $transactionCost;

    /**
     * @param string $overall
     * @param string $timeCost
     * @param string $energyCost
     * @param string $transactionCost
     */
    public function __construct(string $overall, string $timeCost, string $energyCost, string $transactionCost)
    {
        $this->overall = $overall;
        $this->timeCost = $timeCost;
        $this->energyCost = $energyCost;
        $this->transactionCost = $transactionCost;
    }

    /**
     * @return string
     */
    public function getOverall(): string
    {
        return $this->overall;
    }

    /**
     * @return string
     */
    public function getTimeCost(): string
    {
        return $this->timeCost;
    }

    /**
     * @return string
     */
    public function getEnergyCost(): string
    {
        return $this->energyCost;
    }

    /**
     * @return string
     */
    public function getTransactionCost(): string
    {
        return $this->transactionCost;
    }

}
