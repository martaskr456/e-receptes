<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User; // Ensure you import the User model

class LoginTest extends TestCase
{
    use RefreshDatabase; // Refresh database after each test

    /**
     * Test login functionality.
     *
     * @return void
     */
    public function test_login()
    {
        // Create a user (you can adjust these fields as per your User model)
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'), // Adjust as per your password hashing method
        ]);

        // Attempt to login the user
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        // Assert a successful login response
        $response->assertStatus(302); // Redirects on successful login

        // Optionally, assert that the user is authenticated
        $this->assertAuthenticated();
    }
}
