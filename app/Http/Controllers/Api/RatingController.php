<?php

namespace App\Http\Controllers\Api;

use App\ChargingProcessRating\Service\InputModel;
use App\ChargingProcessRating\Service\OutputModel;
use App\ChargingProcessRating\Service\Service;
use App\Http\Controllers\Api\Model\ApiOutput;
use App\Http\Controllers\Controller;
use App\Http\Requests\RateChargingProcessRequest;
use DateTime;
use Exception;
use Illuminate\Http\JsonResponse;
use InvalidArgumentException;

class RatingController extends Controller
{

    private Service $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }


    /**
     * @OA\Post(
     ** path="/api/rate",
     *   tags={"rate"},
     *   summary="applys rate on a charging detail",
     *   operationId="rate",
     * @OA\RequestBody(
     *    required=true,
     *    description="rate and cdr info",
     *        @OA\JsonContent(
     *             type="object",
     *             @OA\Examples(
     *        summary="request body example",
     *        example = "request body example",
     *        value = {
     *              "rate": {
     *                          "energy": 0.3,
     *                          "time": 2,
     *                          "transaction":1
     *                       },
     *              "cdr": {
     *                      "meterStart": 1204307,
     *                      "timestampStart": "2021-04-05T10:04:00Z",
     *                      "meterStop": 1215230,
     *                      "timestampStop": "2021-04-05T11:27:00Z"
     *                      }
     *         },
     *      )
     *        ),
     * ),
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=422,
     *       description="validation failed"
     *   ),
     *   @OA\Response(
     *      response=500,
     *      description="server error"
     *   ),
     *)
     **/
    public function rate(RateChargingProcessRequest $request): JsonResponse
    {
        try {
            $inputModel = $this->makeInputModel($request->all());
        } catch (InvalidArgumentException $exception) {
            /**
             * ApiOutput is an improvement suggestion
             */
            $output = new ApiOutput();
            $output->addError($exception->getMessage());
            return response()->json($output, 422);
        }

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
