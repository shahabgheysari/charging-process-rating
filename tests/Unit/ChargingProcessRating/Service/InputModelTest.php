<?php

namespace Tests\Unit\ChargingProcessRating\Service;

use App\ChargingProcessRating\Service\InputModel;
use DateTime;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class InputModelTest extends TestCase
{

    public function testThrowExceptionWhenTimestampStartIsGreaterThanTimestampStop()
    {
        $this->expectException(InvalidArgumentException::class);
        new InputModel(120,
            123,
            new DateTime('2022-01-02T12:30:25Z'),
            new DateTime('2022-01-02T12:20:25Z'),
            1,
            1,
            1
        );
    }

    public function testThrowExceptionWhenMeterStartIsGreaterThanMeterStop()
    {
        $this->expectException(InvalidArgumentException::class);
        new InputModel(120,
            110,
            new DateTime('2022-01-02T12:30:25Z'),
            new DateTime('2022-01-02T12:40:25Z'),
            1,
            1,
            1
        );
    }
}
