<?php

namespace App\ChargingProcessRating;

use App\ChargingProcessRating\CDR\CDR;

class ChargingProcess
{

    private Rate $rate;
    private CDR $CDR;

    public function __construct(Rate $rate, CDR $CDR)
    {
        $this->rate = $rate;
        $this->CDR = $CDR;
    }

    /**
     * @return Rate
     */
    public function getRate(): Rate
    {
        return $this->rate;
    }

    /**
     * @return CDR
     */
    public function getCDR(): CDR
    {
        return $this->CDR;
    }
}
