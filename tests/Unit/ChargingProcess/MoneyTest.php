<?php

namespace Tests\Unit\ChargingProcess;

use App\ChargingProcess\Money;
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{

    public function testIntAmountPassedValueWillBeReturnedAmountWithDefaultPrecision()
    {
        $sut = new Money(5000);

        $result = $sut->getAmount();

        $this->assertEquals('5000.000', $result);
    }

    public function testFloatAmountPassedValueWillBeReturnedAmountWithDefaultPrecision()
    {
        $sut = new Money(5000.21);

        $result = $sut->getAmount();

        $this->assertEquals('5000.210', $result);
    }

    public function testStringAmountPassedValueWillBeReturnedAmountWithDefaultPrecision()
    {
        $sut = new Money('85412');

        $result = $sut->getAmount();

        $this->assertEquals('85412.000', $result);
    }

    public function testAddingTwoAmountsWillReturnCorrectSumWithDefaultPrecision()
    {
        $sut = new Money('5000.23');

        $result = $sut->add(new Money('2000'));

        $this->assertEquals('7000.230', $result->getAmount());
    }

    public function testAddingTwoAmountsWillReturnCorrectSumWithTwoPrecision()
    {
        $sut = new Money('5000.23', 2);

        $result = $sut->add(new Money('2000', 2));

        $this->assertEquals('7000.23', $result->getAmount());
    }

    public function testSubtractingTwoAmountsWillReturnCorrectSumWithTwoPrecision()
    {
        $sut = new Money(5000.236, 2);

        $result = $sut->subtract(new Money(2000));

        $this->assertEquals('3000.23', $result->getAmount());
    }

    public function testMultiplyWithDefaultPrecision()
    {
        $sut = new Money(23);

        $result = $sut->multiply(3);

        $this->assertEquals('69.000', $result->getAmount());
    }


    public function testMoneyZeroPrecision()
    {
        $sut = new Money(5000.7777, 0);

        $result = $sut->getAmount();

        $this->assertEquals('5000', $result);
    }
}
