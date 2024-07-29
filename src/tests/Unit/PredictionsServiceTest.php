<?php

namespace Tests\Unit;

use App\Models\Predictions;
use App\Services\PredictionsService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class PredictionsServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testGetRandomPrediction()
    {
        $this->seed();

        $service = new PredictionsService();
        $model = $service->getRandomPrediction();

        $this->assertNotEmpty($model);
    }

    public function testCreatePredictionFromRequest()
    {
        $this->seed();
        $request = $this->prepareRequest();
        $testModel = $this->prepareModel();

        $service = new PredictionsService();
        $model = $service->createPredictionFromRequest($request);

        $this->assertEquals($testModel->data, $model->data);
    }

    private function prepareModel()
    {
        $prediction = new Predictions();
        $prediction->data = 'test_prediction';
        $prediction->created_at = now();
        $prediction->updated_at = now();

        return $prediction;
    }


    private function prepareRequest(bool $wrong = false)
    {
        $request = new Request();

        if (!$wrong) {
            $request->request->set('new_prediction', 'test_prediction');
        }

        return $request;
    }
}
