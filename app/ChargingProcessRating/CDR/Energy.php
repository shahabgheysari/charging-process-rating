<?php

namespace App\ChargingProcessRating\CDR;

class Energy
{

    private float $wh;

    /**
     * @param float $wh watt-hour
     */
    public function __construct(float $wh)
    {
        $this->wh = $wh;
    }

    /**
     * @return float
     */
    public function getWh(): float
    {
        return $this->wh;
    }

    /**
     * @return float|int
     */
    public function toKWh(): float|int
    {
        return $this->wh / 1000;
    }


}
