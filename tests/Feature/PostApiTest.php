<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function created_new_post()
    {
        $response = $this->postJson('/api/posts', [
            'title' => 'teste Api',
            'content' => 'Este é um conteúdo de teste'
        ]);

        $response->assertStatus(201)->assertJson([
                'title' => 'teste Api',
                'content' => 'Este é um conteúdo de teste'
            ]);
    }

    public function listed_all_posts() {
        Post::factory()->count(3)->create();
        $response = $this->getJson('/api/posts');
        $response->assertStatus(200)
                ->assertJsonCount(3);
    }

    public function can_show_a_post() {
        $post = Post::factory()->create();
        $response = $this->getJson("/api/posts/{$post->id}");
        $response->assertStatus(200)->assertJsonFragment([
            'title' => $post->title,
            'content'=>$post->content
        ]);
    }

    public function can_updated_a_post() {
        $post = Post::factory()->create();
        $data = [
            'title' => 'Título Atualizado',
            'content' => 'Conteúdo atualizado'
        ];
        $response = $this->putJson("/api/posts/{$post->id}");
        $response->assertStatus(200)->assertJsonFragment($data);
        $this->assertDatabaseHas('posts', $data);
    }

    public function can_delete_a_post() {
        $post = Post::factory()->create();
        $response = $this->deleteJson("/api/posts/{$post->id}");
        $response->assertStatus(204);
        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }
}
