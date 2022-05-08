<?php

namespace App\Http\Controllers\Api;

use App\ChargingProcessRating\Service\InputModel;
use App\ChargingProcessRating\Service\OutputModel;
use App\ChargingProcessRating\Service\Service;
use App\Http\Controllers\Controller;
use App\Http\Requests\RateChargingProcessRequest;
use DateTime;
use Exception;
use Illuminate\Http\JsonResponse;

class RatingController extends Controller
{

    private Service $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function rate(RateChargingProcessRequest $request): JsonResponse
    {
        $inputModel = $this->makeInputModel($request->all());
        $result = $this->service->calculate($inputModel);
         return response()->json($this->makeResponseOutput($result));
    }

    /**
     * @param array $request
     * @return InputModel
     * @throws Exception
     */
    private function makeInputModel(array $request): InputModel
    {
        $meterStart = $request['cdr']['meterStart'];
        $meterStop = $request['cdr']['meterStop'];
        $timestampStart = new DateTime($request['cdr']['timestampStart']);
        $timestampStop = new DateTime($request['cdr']['timestampStop']);
        $energy = $request['rate']['energy'];
        $time = $request['rate']['time'];
        $transaction = $request['rate']['transaction'];
        return new InputModel($meterStart, $meterStop, $timestampStart, $timestampStop,$energy, $time, $transaction);
    }

    private function makeResponseOutput(OutputModel $result): array
    {
        return array(
            "overall" => $result->getOverall(),
            "components" => [
                "energy" => $result->getEnergyCost(),
                "time" => $result->getTimeCost(),
                "transaction" => $result->getTransactionCost()
            ]
        );
    }


}
