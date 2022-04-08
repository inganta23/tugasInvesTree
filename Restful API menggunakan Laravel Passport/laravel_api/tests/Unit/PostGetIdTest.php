<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Post;

class PostGetIdTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        
        $user = User::factory()->count(1)->create()->first();
        $this->actingAs($user, 'api');
        $post = Post::factory()->count(1)->create()->first();
        $this->get('/api/v1/post/'.$post->id, ['Accept' => 'application/json'])->assertStatus(200);
    }
}
