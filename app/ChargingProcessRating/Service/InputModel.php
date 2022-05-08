<?php

namespace App\ChargingProcessRating\Service;

use DateTime;
use InvalidArgumentException;

class InputModel
{
    private int $meterStart;
    private int $meterStop;
    private DateTime $timestampStart;
    private DateTime $timestampStop;
    private int|float|string $energyCost;
    private int|float|string $timeCost;
    private int|float|string $transactionCost;

    /**
     * @param int $meterStart
     * @param int $meterStop
     * @param DateTime $timestampStart
     * @param DateTime $timestampStop
     * @param float|int|string $energyCost
     * @param float|int|string $timeCost
     * @param float|int|string $transactionCost
     */
    public function __construct(int $meterStart,
                                int $meterStop,
                                DateTime $timestampStart,
                                DateTime $timestampStop,
                                float|int|string $energyCost,
                                float|int|string $timeCost,
                                float|int|string $transactionCost)
    {
        if ($meterStart > $meterStop){
            throw  new InvalidArgumentException('meterStart should be less than meterStop');
        }
        if ($timestampStart > $timestampStop){
            throw  new InvalidArgumentException('timestampStart should be less than timestampStop');
        }
        $this->meterStart = $meterStart;
        $this->meterStop = $meterStop;
        $this->timestampStart = $timestampStart;
        $this->timestampStop = $timestampStop;
        $this->energyCost = $energyCost;
        $this->timeCost = $timeCost;
        $this->transactionCost = $transactionCost;
    }

    /**
     * @return int
     */
    public function getMeterStart(): int
    {
        return $this->meterStart;
    }

    /**
     * @return int
     */
    public function getMeterStop(): int
    {
        return $this->meterStop;
    }

    /**
     * @return DateTime
     */
    public function getTimestampStart(): DateTime
    {
        return $this->timestampStart;
    }

    /**
     * @return DateTime
     */
    public function getTimestampStop(): DateTime
    {
        return $this->timestampStop;
    }

    /**
     * @return float|int|string
     */
    public function getEnergyCost(): float|int|string
    {
        return $this->energyCost;
    }

    /**
     * @return float|int|string
     */
    public function getTimeCost(): float|int|string
    {
        return $this->timeCost;
    }

    /**
     * @return float|int|string
     */
    public function getTransactionCost(): float|int|string
    {
        return $this->transactionCost;
    }

}
