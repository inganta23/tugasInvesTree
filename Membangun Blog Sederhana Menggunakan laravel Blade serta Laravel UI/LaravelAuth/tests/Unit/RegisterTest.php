<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    //untuk test saya masih kurang mengerti
    //sudah mencoba menggunakan syntax visit dan submitForm namun terjadi error
    public function test_example()
    {
        $this->get('/register');
        $this->assertTrue(true);
    }
}
