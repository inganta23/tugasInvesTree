<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
use Illuminate\Foundation\Testing\WithFaker;

class PostPostTest extends TestCase
{
    use WithFaker;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        //test post error dengan pesan 404(Not Found) saya sudah mencari solusinya
        //namun masih belum dapat

        
        $user = User::factory()->count(1)->create()->first();
        $this->actingAs($user, 'api');

        $data = [
            'user_id' => 2,
            'category_id' => 1,
            'title' => $this->faker->name(),
            'content' => $this->faker->text(),
            'image' => 'fsd'    
        ];

        $this->post('/api/v1/post', $data, ['Accept' => 'application/json'])->assertStatus(200);
    }
}
