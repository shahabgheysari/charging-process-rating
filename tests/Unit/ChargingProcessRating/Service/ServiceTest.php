<?php

namespace Tests\Unit\ChargingProcessRating\Service;

use App\ChargingProcessRating\Calculator\ComponentsCalculator;
use App\ChargingProcessRating\Calculator\OverallCalculator;
use App\ChargingProcessRating\Calculator\RatingCalculator;
use App\ChargingProcessRating\Service\InputModel;
use App\ChargingProcessRating\Service\InputModelMapper;
use App\ChargingProcessRating\Service\Service;
use DateTime;
use PHPUnit\Framework\TestCase;

class ServiceTest extends TestCase
{

    private function createRatingCalculator(): RatingCalculator
    {
        $componentsCalculator = new ComponentsCalculator();
        $overallCalculator = new OverallCalculator($componentsCalculator);
        return new RatingCalculator($overallCalculator, $componentsCalculator);
    }

    private function createService(): Service
    {
        return new Service($this->createRatingCalculator(), new InputModelMapper());
    }

    public function testCalculate()
    {
        $inputModel = new InputModel(1204307,
            1215230,
            new DateTime('2021-04-05T10:04:00Z')
            , new DateTime('2021-04-05T11:27:00Z'),
            0.30,
            2,
            1);
        $sut = $this->createService();

        $result = $sut->calculate($inputModel);

        self::assertEquals(7.04, $result->getOverall());
        self::assertEquals(3.276, $result->getEnergyCost());
        self::assertEquals(2.766, $result->getTimeCost());
        self::assertEquals(1, $result->getTransactionCost());
    }


}
