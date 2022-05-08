<?php

namespace Tests\Feature\Http\Controllers\Api;

use Tests\TestCase;


class RateApiTest extends TestCase
{

    public function testRateReturn422OnFailedValidation()
    {
        $response = $this->call('POST', 'api/rate', []);
        $response->assertStatus(422);
    }

    public function testRateReturn200OnSuccessValidation()
    {
        $response = $this->call('POST', 'api/rate',
            [
                "rate" => [
                    "energy" => 0.3,
                    "time" => 2,
                    "transaction" => 1
                ],
                "cdr" => [
                    "meterStart" => 1204307,
                    "timestampStart" => "2021-04-05T10:04:00Z",
                    "meterStop" => 1215230,
                    "timestampStop" => "2021-04-05T11:27:00Z"
                ]]
        );
        $response->assertStatus(200);
    }

    public function testRateReturnValidResponse()
    {
        $response = $this->postJson('api/rate',
            [
                "rate" => [
                    "energy" => 0.3,
                    "time" => 2,
                    "transaction" => 1
                ],
                "cdr" => [
                    "meterStart" => 1204307,
                    "timestampStart" => "2021-04-05T10:04:00Z",
                    "meterStop" => 1215230,
                    "timestampStop" => "2021-04-05T11:27:00Z"
                ]]
        );

        $response->assertJson([
            "overall" => 7.04,
            "components" => [
                "energy" => 3.276,
                "time" => 2.766,
                "transaction" => 1
            ]
        ]);
    }

}
