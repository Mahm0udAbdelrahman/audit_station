<?php

namespace Modules\Auth\Tests\Feature\Register;

use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_register_index()
    {
        $response = $this->get('api/register');
        $response->assertStatus(200);
    }
    public function test_register_store()
    {
        $register = [
            'name' => 'test',
            'email' => 'testt@gmail.com',
            'password' => '1234567899',
            'phone' => '011466133346848',
        ];
        $response = $this->postJson('api/register', $register);
        $response->assertStatus(200);
        $this->assertDatabaseHas('users', $register);
        $response->assertJson($register);


    }
}
