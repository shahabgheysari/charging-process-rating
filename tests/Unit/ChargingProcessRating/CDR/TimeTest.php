<?php

namespace Tests\Unit\ChargingProcessRating\CDR;

use App\ChargingProcessRating\CDR\Time;
use PHPUnit\Framework\TestCase;
use Tests\Unit\FloatValueAssertHelper;

class TimeTest extends TestCase
{
    use FloatValueAssertHelper;

    public function testConversionToHourTestOne()
    {
        $sut = new Time(1200);

        $result = $sut->toHours();

        self::assertEquals(0.333,$this->truncateFloat($result,3));

    }

    public function testConversionToHourTestTwo()
    {
        $sut = new Time(12500);

        $result = $sut->toHours();

        self::assertEquals(3.472,$this->truncateFloat($result,3));

    }
}
