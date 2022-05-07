<?php

namespace Tests\Unit\ChargingProcessRating\Calculator;

use App\ChargingProcessRating\Calculator\ComponentsCalculator;
use App\ChargingProcessRating\Calculator\OverallCalculator;
use App\ChargingProcessRating\CDR\CDR;
use App\ChargingProcessRating\CDR\Energy;
use App\ChargingProcessRating\CDR\Time;
use App\ChargingProcessRating\CDR\Transaction;
use App\ChargingProcessRating\ChargingProcess;
use App\ChargingProcessRating\Money;
use App\ChargingProcessRating\Rate;
use PHPUnit\Framework\TestCase;

class OverallCalculatorTest extends TestCase
{

    public function testCalculate()
    {
        $CDR = new CDR(new Energy(10.923), new Time(4980), new Transaction());
        $rate = new Rate(new Money(0.30), new Money(2), new Money(1));
        $chargingProcess = new ChargingProcess($rate,$CDR);
        $sut = new OverallCalculator(new ComponentsCalculator());

        $result = $sut->calculate($chargingProcess);

        self::assertEquals(7.04,$result->getOverall()->getAmount());
    }
}
