<?php

namespace App\Services;

use App\Models\Predictions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class PredictionsService
{
    /**
     * @return mixed|string
     */
    public function getRandomPrediction()
    {
        $model = DB::table('predictions')->inRandomOrder()->first();
        $data = '';

        if (isset($model)) {
            $data = $model->data;
        }

        return $data;
    }

    public function createPredictionFromRequest(Request $request): Predictions
    {
        $this->validateRequest($request);

        $prediction = new Predictions();
        $prediction->data = $request->get('new_prediction');
        $prediction->created_at = now();
        $prediction->updated_at = now();

        $prediction->save();

        return $prediction;
    }

    /**
     * @param Request $request
     * @return void
     */
    private function validateRequest(Request $request)
    {
        $data = $request->request->all();

        if (!isset($data['new_prediction']) || $data['new_prediction'] === "") {
            throw ValidationException::withMessages([
                'new_prediction' => trans('predictions.empty_new'),
            ]);
        }
    }
}
