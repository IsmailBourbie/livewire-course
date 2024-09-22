<?php

namespace Tests\Feature\Livewire;

use App\Livewire\ShowPosts;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CreatePostTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_create_new_post(): void
    {
        $post = Post::factory()->make();
        Livewire::test(ShowPosts::class)
            ->set('form.title', $post->title)
            ->set('form.content', $post->content)
            ->call('create');

        $this->assertEquals(Post::query()->firstOrFail()->title, $post->title);
    }

    #[Test]
    #[DataProvider('validationRules')]
    public function test_it_requires_valid_data($inputName, $inputValue): void
    {

        Livewire::test(ShowPosts::class)
            ->set("form.$inputName", $inputValue)
            ->call('create')
            ->assertHasErrors("form.$inputName");

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
