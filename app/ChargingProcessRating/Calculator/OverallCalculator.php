<?php

namespace App\ChargingProcessRating\Calculator;


use App\ChargingProcessRating\ChargingProcess;

class OverallCalculator
{
    private ComponentsCalculator $componentsCalculator;

    public function __construct(ComponentsCalculator $componentsCalculator)
    {
        $this->componentsCalculator = $componentsCalculator;
    }

    public function calculate(ChargingProcess $chargingProcess): OverallAmount
    {
        $componentsAmounts = $this->componentsCalculator->calculate($chargingProcess);
        return new OverallAmount(
            $componentsAmounts->getTransaction()->add(
                $componentsAmounts->getTime()->add(
                    $componentsAmounts->getEnergy()
                )
            )
        );
    }
}
