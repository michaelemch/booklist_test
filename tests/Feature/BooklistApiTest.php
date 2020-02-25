<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BooklistApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testGetBooks()
    {
        $response = $this->json('GET', '/api/books');
        

        $response->assertStatus(200);

        $response->assertJsonStructure(
            [
                [
                    'id', 'title', 'author', 'order', 'created_at', 'updated_at'
                ]
            ]
        );

    }

    public function testAddBook()
    {
        $data = [
            'id' => 6,
            'title' => "testAddBook",
            'author' => "phpunit",
            'order' => 1
        ];

        $response = $this->json('POST', '/api/add_book', $data);

        $response->assertStatus(201);
    }

    public function testEditBook()
    {
        $data = [
            'title' => 'testEditBook'
        ];
        $response = $this->json('POST', '/api/update_book/6', $data);

        $response->assertStatus(200);
    }

    public function testDeleteBook()
    {
        $response = $this->json('DELETE', '/api/delete_book/6');

        $response->assertStatus(204);
    }
    
}
