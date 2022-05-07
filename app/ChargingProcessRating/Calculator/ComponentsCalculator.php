<?php

namespace App\ChargingProcessRating\Calculator;

use App\ChargingProcessRating\ChargingProcess;
use App\ChargingProcessRating\Money;

class ComponentsCalculator
{
    public function calculate(ChargingProcess $chargingProcess): ComponentsAmounts
    {
        $energy = $this->calculateEnergyAmount($chargingProcess);
        $time = $this->calculateTimeAmount($chargingProcess);
        $transaction = $this->calculateTransactionAmount($chargingProcess);

        return new ComponentsAmounts($energy, $time, $transaction);
    }

    /**
     * @param ChargingProcess $chargingProcess
     * @return Money
     */
    private function calculateEnergyAmount(ChargingProcess $chargingProcess): Money
    {
        return $chargingProcess->getRate()->getEnergy()->multiply($chargingProcess->getCDR()->getEnergy()->getAmount());
    }

    /**
     * @param ChargingProcess $chargingProcess
     * @return Money
     */
    private function calculateTimeAmount(ChargingProcess $chargingProcess): Money
    {
        return $chargingProcess->getRate()->getTime()->multiply($chargingProcess->getCDR()->getTime()->toHours());
    }

    /**
     * @param ChargingProcess $chargingProcess
     * @return Money
     */
    private function calculateTransactionAmount(ChargingProcess $chargingProcess): Money
    {
        return $chargingProcess->getRate()->getTransaction()->multiply($chargingProcess->getCDR()->getTransaction()->getValue());
    }

}
