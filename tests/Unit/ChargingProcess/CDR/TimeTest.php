<?php

namespace Tests\Unit\ChargingProcess\CDR;

use App\ChargingProcessRating\CDR\Time;
use PHPUnit\Framework\TestCase;
use Tests\Unit\FloatValueAssertHelper;

class TimeTest extends TestCase
{
    use FloatValueAssertHelper;

    public function testToHoursOne()
    {
        $sut = new Time(1200);

        $result = $sut->toHours();

        self::assertEquals(0.333,$this->truncateFloat($result,3));

    }

    public function testToHoursTwo()
    {
        $sut = new Time(12500);

        $result = $sut->toHours();

        self::assertEquals(3.472,$this->truncateFloat($result,3));

    }
}
