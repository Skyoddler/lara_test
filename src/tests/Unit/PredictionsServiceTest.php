<?php

namespace Tests\Unit;

use App\DTO\PredictionsDTO;
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
        $data = $service->getRandomPrediction();

        $this->assertNotEmpty($data);
    }

    public function testCreatePredictionFromDTO()
    {
        $this->seed();
        $request = $this->prepareRequest();
        $testModel = $this->prepareModel();

        $service = new PredictionsService();
        $predictionsDTO = PredictionsDTO::fromRequest($request);
        $model = $service->createPredictionFromDTO($predictionsDTO);

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
