<?php

namespace App\ChargingProcessRating\Calculator;

use App\ChargingProcessRating\ChargingProcess;

class RatingCalculator
{
    private OverallCalculator $overallCalculator;
    private ComponentsCalculator $componentsCalculator;

    public function __construct(OverallCalculator $overallCalculator, ComponentsCalculator $componentsCalculator)
    {
        $this->overallCalculator = $overallCalculator;
        $this->componentsCalculator = $componentsCalculator;
    }

    public function calculate(ChargingProcess $chargingProcess): RatingResult
    {
        $componentsAmounts = $this->componentsCalculator->calculate($chargingProcess);
        $overallAmount = $this->overallCalculator->calculate($chargingProcess);
        return new RatingResult($overallAmount, $componentsAmounts);
    }

}
