<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class PredictionsService
{
    public function getRandomPrediction()
    {
        return DB::table('predictions')->inRandomOrder()->first()->data;
    }
}
