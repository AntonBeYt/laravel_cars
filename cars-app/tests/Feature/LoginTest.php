<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;


class LoginTest extends TestCase
{
    public function test_view_login_form(): void
    {
        $response = $this->get('/');
        $response->assertSeeText('Email');
        $response->assertStatus(200);
    }
    public function test_login_user(): void
    {
        $user = User::create(
            [
                'name' => 'Testare',
                'email' => 'test@test.se',
                'password' => Hash::make('hej')
            ]
        );
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'hej',
        ]);
        $this->followingRedirects();
        $response->assertRedirect('/dashboard');
        $this->get('/dashboard')->assertSee($user->name);
    }
    public function test_login_user_without_password(): void
    {
        $response = $this->post('/login', [
            'email' => '',
            'password' => '',
        ]);
        $response->assertRedirect('/');
        $this->get('/')->assertSeeText('invalid login credentials');
    }
}
