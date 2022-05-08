<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class RateChargingProcessRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "rate.energy" => "required",
            "rate.time" => "required",
            "rate.transaction" => "required",
            "cdr.meterStart" => "required",
            "cdr.meterStop" => "required",
            "cdr.timestampStart" => "required|date_format:Y-m-d\TH:i:sp",
            "cdr.timestampStop" => "required|date_format:Y-m-d\TH:i:sp",
        ];
    }

    public function messages()
    {
        return [
            "cdr.timestampStop.date_format"=>"The :attribute does not match the format Y-m-dTH:i:sZ(ISO 8601)",
            "cdr.timestampStart.date_format"=>"The :attribute does not match the format Y-m-dTH:i:sZ(ISO 8601)",
        ];
    }


    protected function failedValidation(Validator $validator)
    {
        $response = new JsonResponse(['errors' => $validator->errors()], 422);
        throw new ValidationException($validator, $response);
    }
}
