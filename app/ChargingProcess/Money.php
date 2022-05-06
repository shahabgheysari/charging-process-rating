<?php

namespace App\ChargingProcess;


class Money
{

    private int $precision;
    private string $amount;

    /**
     * @param int|float|string $amount
     * @param int $precision
     */
    public function __construct(int|float|string $amount, int $precision = 3)
    {
        $this->amount = strval($amount);
        $this->precision = $precision;
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return bcmul($this->amount, '1', $this->precision);
    }

    public function add(Money $other): Money
    {
        return new Money(bcadd($this->getAmount(), $other->getAmount(), $this->precision), $this->precision);
    }

    public function subtract(Money $other): Money
    {
        return new Money(bcsub($this->getAmount(), $other->getAmount(), $this->precision), $this->precision);
    }

    public function multiply($operand): Money
    {
        return new Money(bcmul($this->getAmount(), (string)$operand, $this->precision), $this->precision);
    }


}
