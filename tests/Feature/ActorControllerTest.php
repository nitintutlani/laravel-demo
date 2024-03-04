<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Actor;

class ActorControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index()
    {
        Actor::factory()->count(5)->create();

        $response = $this->get('/api/actors');

        $response->assertStatus(200);
        $response->assertJsonCount(5, 'data');
    }

    public function test_store()
    {
        $data = [
            'name' => 'Amitabh Bachchan',
        ];

        $response = $this->post('/api/actors', $data);

        $response->assertStatus(201);
        $this->assertDatabaseHas('actors', $data);

        $invalidData = [
            'eye_color' => 'blue', // name is required
        ];
    
        $response = $this->post('/api/actors', $invalidData);
    
        $response->assertStatus(422); // 422 Unprocessable Entity
        $response->assertJsonValidationErrors('name');    
    }

    public function test_show()
    {
        $actor = Actor::factory()->create();

        $response = $this->get("/api/actors/{$actor->id}");

        $response->assertStatus(200);
        $response->assertJson($actor->toArray());
    }

    public function test_update()
    {
        $actor = Actor::factory()->create();
        $data = [
            'name' => 'Amitabh Bachchan',
            'birth_year' => '1950',
            'eye_color' => 'brown',
            'gender' => 'Male',
            'hair_color' => 'black',
        ];

        $response = $this->put("/api/actors/{$actor->id}", $data);

        $response->assertStatus(200);
        $this->assertDatabaseHas('actors', $data);
    }

    public function test_destroy()
    {
        $actor = Actor::factory()->create();

        $response = $this->delete("/api/actors/{$actor->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('actors', ['id' => $actor->id]);
    }
}