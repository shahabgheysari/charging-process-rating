<?php

namespace App\ChargingProcessRating\Calculator;

class RatingResult
{

    private OverallAmount $overallAmount;
    private ComponentsAmounts $componentsAmounts;

    public function __construct(OverallAmount $overallAmount, ComponentsAmounts $componentsAmounts)
    {
        $this->overallAmount = $overallAmount;
        $this->componentsAmounts = $componentsAmounts;
    }

    /**
     * @return OverallAmount
     */
    public function getOverallAmount(): OverallAmount
    {
        return $this->overallAmount;
    }

    /**
     * @return ComponentsAmounts
     */
    public function getComponentsAmounts(): ComponentsAmounts
    {
        return $this->componentsAmounts;
    }

}
