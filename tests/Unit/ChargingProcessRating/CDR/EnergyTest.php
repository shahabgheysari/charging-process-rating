<?php

namespace Tests\Unit\ChargingProcessRating\CDR;

use App\ChargingProcessRating\CDR\Energy;
use PHPUnit\Framework\TestCase;

class EnergyTest extends TestCase
{

    public function testToKWh()
    {
        $sut = new Energy(15220);

        $result = $sut->toKWh();

        self::assertEquals(15.220,$result);
    }
}
