<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;


class PostGetTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        //saya menambahkan method first dikarenakan error sebelumnya
        //dan saya mendapatkan solusi lewat stackoverflow untuk menggunakan
        //method first()
        $user = User::factory()->count(1)->create()->first();
        $this->actingAs($user, 'api');

        $this->get('/api/v1/post')->assertStatus(200);
    }
}
