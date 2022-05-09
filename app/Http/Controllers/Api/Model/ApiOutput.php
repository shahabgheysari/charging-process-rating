<?php

namespace App\Http\Controllers\Api\Model;

use JsonSerializable;

class ApiOutput implements JsonSerializable
{
    private array $errors = [];
    private array $data = [];

    public function addError($error)
    {
        $this->errors[] = $error;
    }

    public function addData($data)
    {
        $this->data[] = $data;
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    public function jsonSerialize()
    {
        return [
          'errors'=>$this->errors,
          'data'=>$this->data,
        ];
    }
}
