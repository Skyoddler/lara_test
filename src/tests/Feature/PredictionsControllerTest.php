<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PredictionsControllerTest extends TestCase
{

    use RefreshDatabase;

    protected $seed = true;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGuestRoute()
    {
        $response = $this->get('/');


        $response->assertStatus(200);
    }

    public function testIndexRoute()
    {
        $user = $this->getUser();

        $response = $this->actingAs($user)->get('/index');

        $response->assertStatus(200);
    }

    public function testCreateRouteAdmin()
    {
        $user = $this->getUser(true);

        $response = $this->actingAs($user)->get('/create');

        $response->assertStatus(200);
    }

    public function testCreateRouteUser()
    {
        $user = $this->getUser();

        $response = $this->actingAs($user)->get('/create');

        $response->assertStatus(403);
    }

    public function testStoreRouteAdmin()
    {
        $user = $this->getUser(true);

        $response = $this->actingAs($user)->post('/store', ['new_prediction' => 'test_prediction']);
        $response->assertRedirectContains('/index');

    }

    public function testStoreRouteUser()
    {
        $user = $this->getUser();

        $response = $this->actingAs($user)->post('/store');

        $response->assertStatus(403);
    }

    private function getUser(bool $isAdmin = false)
    {
        $user = User::factory()->create();
        $user->is_admin = $isAdmin;

        return $user;
    }
}
