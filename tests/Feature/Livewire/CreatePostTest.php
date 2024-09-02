<?php

namespace Tests\Feature\Livewire;

use App\Livewire\CreatePost;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CreatePostTest extends TestCase
{
    use RefreshDatabase;

    public function test_renders_successfully()
    {
        Livewire::test(CreatePost::class)
            ->assertStatus(200);
    }


    public function test_it_create_new_post(): void
    {
        $post = Post::factory()->make();
        Livewire::test(CreatePost::class)
            ->set('title', $post->title)
            ->set('content', $post->content)
            ->call('save');

        $this->assertEquals(Post::query()->firstOrFail()->title, $post->title);
    }

    #[Test]
    #[DataProvider('validationRules')]
    public function test_it_requires_valid_data($inputName, $inputValue): void
    {

        Livewire::test(CreatePost::class)
            ->set($inputName, $inputValue)
            ->call('save')
            ->assertHasErrors($inputName);

    }


    public static function validationRules(): array
    {
        return [
            'title is required' => ['title', ''],
            'title must be more than 4 characters' => ['title', 'yes'],

            'content is required' => ['content', ''],
        ];
    }
}
