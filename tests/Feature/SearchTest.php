<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class SearchTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_search(): void
    {
        $book = Book::factory()->create([
            'title' => 'Test Book',
            'cover' => 'test-cover.jpg',
            'type' => 1,
        ]);

        Cache::shouldReceive('remember')
            ->once()
            ->withAnyArgs()
            ->andReturn(collect([$book]));

        $response = $this->get(route('search', ['search' => 'Test']));


        $response->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'title',
                    'cover',
                    'type',
                ]
            ]);
    }
}
