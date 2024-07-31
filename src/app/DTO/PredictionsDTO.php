<?php

namespace App\DTO;

use Illuminate\Http\Request;

class PredictionsDTO
{
    public string $data;

    public function __construct(string $data)
    {
        $this->data = $data;
    }

    public static function fromRequest(Request $request)
    {
        return new self($request->get('new_prediction'));
    }
}
