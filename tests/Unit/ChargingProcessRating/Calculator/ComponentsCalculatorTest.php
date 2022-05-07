<?php

namespace Tests\Unit\ChargingProcessRating\Calculator;

use App\ChargingProcessRating\Calculator\ComponentsCalculator;
use App\ChargingProcessRating\CDR\CDR;
use App\ChargingProcessRating\CDR\Energy;
use App\ChargingProcessRating\CDR\Time;
use App\ChargingProcessRating\CDR\Transaction;
use App\ChargingProcessRating\ChargingProcess;
use App\ChargingProcessRating\Money;
use App\ChargingProcessRating\Rate;
use PHPUnit\Framework\TestCase;

class ComponentsCalculatorTest extends TestCase
{
    public function testCalculateOne()
    {
        $CDR = new CDR(new Energy(10.923), new Time(4980), new Transaction());
        $rate = new Rate(new Money(0.30), new Money(2), new Money(1));
        $chargingProcess = new ChargingProcess($rate,$CDR);
        $sut = new ComponentsCalculator();

        $result = $sut->calculate($chargingProcess);

        self::assertEquals(3.276,$result->getEnergy()->getAmount());
        self::assertEquals(2.766,$result->getTime()->getAmount());
        self::assertEquals(1,$result->getTransaction()->getAmount());
    }
}