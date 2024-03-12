<?php

namespace Tests\Feature;

use App\Models\Car;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;



class CarTest extends TestCase
{
    use RefreshDatabase;

    public function test_add_car(): void
    {
        $this->followingRedirects();

        $user = User::create(
            [
                'name' => 'Testare',
                'email' => 'test@testmail.se',
                'password' => Hash::make('hej')
            ]
        );

        $this->actingAs($user);

        $this->post('/addCar', [
            'model' => 'Ford',
            'make' => 'Fiesta',
            'reg_nr' => 'AAA-111',
            'owner' => 'Testare Testsson',
            'fine' => '100',
            'user_id' => $user->id,
        ]);
        $this->assertDatabaseHas('cars', ['owner' => 'Testare Testsson']);
    }

    public function test_update_fine(): void
    {

        $this->followingRedirects();

        $user = User::create(
            [
                'name' => 'Testare',
                'email' => 'test@testmail.se',
                'password' => Hash::make('hej')
            ]
        );

        $this->actingAs($user);

        $car = Car::create([
            'model' => 'Ford',
            'make' => 'Fiesta',
            'reg_nr' => 'AAA-111',
            'owner' => 'Testare Testsson',
            'fine' => '100',
            'user_id' => $user->id,
        ]);

        $this->patch("/car/{$car->id}/updateFine", [
            '_method' => 'PATCH',
            'newFine' => '200'
        ]);
        $this->assertDatabaseHas('cars', [
            'id' => $car->id,
            'fine' => '200',
        ]);
    }

    public function test_delete_car(): void
    {

        $this->followingRedirects();

        $user = User::create(
            [
                'name' => 'Testare',
                'email' => 'test@testmail.se',
                'password' => Hash::make('hej')
            ]
        );

        $this->actingAs($user);

        $car = Car::create([
            'model' => 'Ford',
            'make' => 'Fiesta',
            'reg_nr' => 'AAA-111',
            'owner' => 'Testare Testsson',
            'fine' => '100',
            'user_id' => $user->id,
        ]);

        $this->post("/car/{$car->id}/delete");
        $this->assertDatabaseMissing('cars', ['id' => '{$car->id}']);
    }
}
