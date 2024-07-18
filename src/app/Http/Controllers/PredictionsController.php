<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePredictionsRequest;
use App\Http\Requests\UpdatePredictionsRequest;
use App\Models\Predictions;
use App\Services\PredictionsService;

class PredictionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('predictions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePredictionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePredictionsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(PredictionsService $service)
    {
        $prediction = $service->getRandomPrediction();

        return view('predictions.index', ['prediction' => $prediction]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Predictions  $predictions
     * @return \Illuminate\Http\Response
     */
    public function edit(Predictions $predictions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePredictionsRequest  $request
     * @param  \App\Models\Predictions  $predictions
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePredictionsRequest $request, Predictions $predictions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Predictions  $predictions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Predictions $predictions)
    {
        //
    }
}
