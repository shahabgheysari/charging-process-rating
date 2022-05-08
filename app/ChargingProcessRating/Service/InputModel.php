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
    private int|float|string $energyPrice;
    private int|float|string $timePrice;
    private int|float|string $transactionPrice;

    /**
     * @param int $meterStart
     * @param int $meterStop
     * @param DateTime $timestampStart
     * @param DateTime $timestampStop
     * @param float|int|string $energyPrice
     * @param float|int|string $timePrice
     * @param float|int|string $transactionPrice
     */
    public function __construct(int              $meterStart,
                                int              $meterStop,
                                DateTime         $timestampStart,
                                DateTime         $timestampStop,
                                float|int|string $energyPrice,
                                float|int|string $timePrice,
                                float|int|string $transactionPrice)
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
        $this->energyPrice = $energyPrice;
        $this->timePrice = $timePrice;
        $this->transactionPrice = $transactionPrice;
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
    public function getEnergyPrice(): float|int|string
    {
        return $this->energyPrice;
    }

    /**
     * @return float|int|string
     */
    public function getTimePrice(): float|int|string
    {
        return $this->timePrice;
    }

    /**
     * @return float|int|string
     */
    public function getTransactionPrice(): float|int|string
    {
        return $this->transactionPrice;
    }

}
