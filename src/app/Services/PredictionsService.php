<?php

namespace App\Services;

use App\Models\Predictions;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PredictionsService
{
    /**
     * @return mixed|string
     */
    public function getRandomPrediction()
    {
        $data = Predictions::query()->inRandomOrder()->first();

        return $data->data ?? '';
    }

    public function createPredictionFromRequest(Request $request): Predictions
    {
        $prediction = new Predictions();
        $prediction->data = $request->get('new_prediction');

        $prediction->save();

        return $prediction;
    }
}
