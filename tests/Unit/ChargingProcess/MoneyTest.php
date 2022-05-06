<?php

namespace Tests\Unit\ChargingProcess;

use App\ChargingProcess\Money;
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{

    public function testIntAmountPassedValueWillBeReturnedAmountWithDefaultPrecision()
    {
        $money = new Money(5000);
        $this->assertEquals('5000.000', $money->getAmount());
    }

    public function testFloatAmountPassedValueWillBeReturnedAmountWithDefaultPrecision()
    {
        $money = new Money(5000.21);
        $this->assertEquals('5000.210', $money->getAmount());
    }

    public function testStringAmountPassedValueWillBeReturnedAmountWithDefaultPrecision()
    {
        $money = new Money('85412');
        $this->assertEquals('85412.000', $money->getAmount());
    }

    public function testAddingTwoAmountsWillReturnCorrectSumWithDefaultPrecision()
    {
        $money = new Money('5000.23');
        $result = $money->add(new Money('2000'));
        $this->assertEquals('7000.230', $result->getAmount());
    }

    public function testAddingTwoAmountsWillReturnCorrectSumWithTwoPrecision()
    {
        $money = new Money('5000.23', 2);
        $result = $money->add(new Money('2000', 2));
        $this->assertEquals('7000.23', $result->getAmount());
    }

    public function testSubtractingTwoAmountsWillReturnCorrectSumWithTwoPrecision()
    {
        $money = new Money(5000.236, 2);
        $result = $money->subtract(new Money(2000));
        $this->assertEquals('3000.23', $result->getAmount());
    }

    public function testMultiplyWithDefaultPrecision()
    {
        $money = new Money(23);
        $result = $money->multiply(3);
        $this->assertEquals('69.000', $result->getAmount());
    }


    public function testMoneyZeroPrecision()
    {
        $money = new Money(5000.7777, 0);
        $this->assertEquals('5000', $money->getAmount());
    }
}
