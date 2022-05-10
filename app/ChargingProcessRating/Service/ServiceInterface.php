<?php

namespace App\ChargingProcessRating\Service;

interface ServiceInterface
{
    public function calculate(InputModel $inputModel): OutputModel;
}
