<?php

namespace App\Services;

use App\Models\Predictions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class PredictionsService
{
    /**
     * @return Model|Builder|object|null
     */
    public function getRandomPrediction()
    {
        return DB::table('predictions')->inRandomOrder()->first();
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
        $data = $request->all();

        if (!isset($data['new_prediction']) || $data['new_prediction'] === "") {
            throw ValidationException::withMessages([
                'new_prediction' => trans('predictions.empty_new'),
            ]);
        }
    }
}
