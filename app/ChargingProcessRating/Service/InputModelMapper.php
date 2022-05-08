<?php

namespace App\ChargingProcessRating\Service;

use App\ChargingProcessRating\CDR\CDR;
use App\ChargingProcessRating\CDR\Energy;
use App\ChargingProcessRating\CDR\Time;
use App\ChargingProcessRating\CDR\Transaction;
use App\ChargingProcessRating\ChargingProcess;
use App\ChargingProcessRating\Money;
use App\ChargingProcessRating\Rate;

class InputModelMapper
{
    /**
     * @param InputModel $inputModel
     * @return ChargingProcess
     */
    public function mapToChargingProcess(InputModel $inputModel): ChargingProcess
    {
        return new ChargingProcess($this->makeRate($inputModel), $this->makeCDR($inputModel));
    }

    private function makeCDR(InputModel $inputModel): CDR
    {
        $energy = new Energy($inputModel->getMeterStop() - $inputModel->getMeterStart());
        $time = new Time($inputModel->getTimestampStop()->getTimestamp() - $inputModel->getTimestampStart()->getTimestamp());
        $transaction = new Transaction();
        return new CDR($energy, $time, $transaction);
    }


    private function makeRate(InputModel $inputModel): Rate
    {
        $energy = new Money($inputModel->getEnergyPrice());
        $time = new Money($inputModel->getTimePrice());
        $transaction = new Money($inputModel->getTransactionPrice());
        return new Rate($energy, $time, $transaction);
    }
}
