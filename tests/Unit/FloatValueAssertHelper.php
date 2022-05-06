<?php

namespace Tests\Unit;

trait FloatValueAssertHelper
{
    public function truncateFloat(float $value, int $precision): float|int
    {
        $n = pow(10, $precision);
        return intval($value * $n) / $n;
    }
}
