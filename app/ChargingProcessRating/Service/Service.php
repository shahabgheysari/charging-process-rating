<?php

namespace App\ChargingProcessRating\Service;

use App\ChargingProcessRating\Calculator\RatingCalculator;
use App\ChargingProcessRating\Calculator\RatingResult;

class Service implements ServiceInterface
{

    private RatingCalculator $ratingCalculator;
    private InputModelMapper $inputModelMapper;

    public function __construct(RatingCalculator $ratingCalculator,InputModelMapper $inputModelMapper)
    {
        $this->ratingCalculator = $ratingCalculator;
        $this->inputModelMapper = $inputModelMapper;
    }

    public function calculate(InputModel $inputModel): OutputModel
    {
        $chargingProcess = $this->inputModelMapper->mapToChargingProcess($inputModel);
        $result = $this->ratingCalculator->calculate($chargingProcess);
        return $this->makeOutput($result);
    }

    /**
     * @param RatingResult $result
     * @return OutputModel
     */
    private function makeOutput(RatingResult $result): OutputModel
    {
        return new OutputModel(
            $result->getOverallAmount()->getOverall()->getAmount(),
            $result->getComponentsAmounts()->getTime()->getAmount(),
            $result->getComponentsAmounts()->getEnergy()->getAmount(),
            $result->getComponentsAmounts()->getTransaction()->getAmount()
        );
    }
}
