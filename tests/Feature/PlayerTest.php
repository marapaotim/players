<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Model\Player;

class PlayerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_jobs_import_data()
    {
        app(\App\Service\SubmitJob::class)->handle();
        $this->assertTrue(True);
    }

    public function test_get_all_players_data()
    {
        $faker = factory(\App\Model\Player::class)->create();
        $classService = \App::make(\App\Service\PlayerServiceInterface::class);
        $classService->all();
        $this->assertTrue(True);
    }

    public function test_no_player_exist()
    {
        $this->get('/api/player/0')->assertStatus(404);
    }

    public function test_find_player_full_data()
    {
        $classService = \App::make(\App\Service\PlayerServiceInterface::class);
        $classService->find(1);
        $this->assertTrue(True);
    }
}
