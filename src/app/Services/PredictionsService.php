<?php

namespace App\Services;

use App\DTO\PredictionsDTO;
use App\Models\Predictions;
use Illuminate\Http\Request;

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

    public function createPredictionFromDTO(PredictionsDTO $predictionsDTO): Predictions
    {
        $prediction = new Predictions();
        $prediction->data = $predictionsDTO->data;

        $prediction->save();

        return $prediction;
    }
}
