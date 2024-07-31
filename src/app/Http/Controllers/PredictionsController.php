<?php

namespace App\Http\Controllers;

use App\DTO\PredictionsDTO;
use App\Http\Requests\CreatePredictionsRequest;
use App\Http\Requests\StorePredictionsRequest;
use App\Http\Requests\UpdatePredictionsRequest;
use App\Models\Predictions;
use App\Services\PredictionsService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PredictionsController extends Controller
{
    private PredictionsService $predictionsService;

    public function __construct(PredictionsService $predictionsService)
    {
        $this->predictionsService = $predictionsService;
    }

    /**
     * @return Application|Factory|View
     */
    public function guest()
    {
        $predictionData = $this->predictionsService->getRandomPrediction();

        return view('predictions.guest', ['prediction' => $predictionData]);
    }

    /**
     * @param Predictions|null $prediction
     * @return Application|Factory|View
     */
    public function index(Predictions $prediction = null)
    {
        $predictionData = '';

        if (!isset($prediction)) {
            $predictionData = $this->predictionsService->getRandomPrediction();
        } else {
            $predictionData = $prediction->data;
        }

        return view('predictions.index', ['prediction' => $predictionData]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create(CreatePredictionsRequest $request)
    {
        return view('predictions.create');
    }

    /**
     * @param StorePredictionsRequest $request
     * @return RedirectResponse
     */
    public function store(StorePredictionsRequest $request)
    {
        $predictionDTO = PredictionsDTO::fromRequest($request);
        $prediction = $this->predictionsService->createPredictionFromDTO($predictionDTO);

        return redirect()->route('predictions.index', ['prediction' => $prediction->id]);
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Predictions $predictions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(UpdatePredictionsRequest $request, Predictions $predictions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Predictions $predictions)
    {
        //
    }
}
