<?php

namespace Tests\Unit\ChargingProcessRating\CDR;

use App\ChargingProcessRating\CDR\Energy;
use PHPUnit\Framework\TestCase;

class EnergyTest extends TestCase
{

    public function testReturnCorrectConvertedValueToKwhTestOne()
    {
        $sut = new Energy(15220);

        $result = $sut->toKWh();

        self::assertEquals(15.220,$result);
    }

    public function testReturnCorrectConvertedValueToKwhTestTwo()
    {
        $sut = new Energy(1320);

        $result = $sut->toKWh();

        self::assertEquals(1.32,$result);
    }
}
