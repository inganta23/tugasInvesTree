<?php

namespace Tests\Unit;

use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $data = [
            'email'=> 'bonita.dach@example.com',
            'password'=> 123456,  
        ];
        $this->post('/api/v1/login', $data, ['Accept' => 'application/json'])->assertStatus(200);
    }
}
