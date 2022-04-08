<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class RegisterTest extends TestCase
{
    use WithFaker;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {   
        $data = [
            'name'=> $this->faker->name(),
            'email'=> $this->faker->unique()->safeEmail(),
            'password'=> 123456,
            'c_password'=> 123456,
            
        ];
        $this->post('/api/v1/register', $data, ['Accept' => 'application/json'])->assertStatus(200);

    }
}
