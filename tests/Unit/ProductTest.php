<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


class ProductTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testGetBooks()
    {
        $this->assertTrue(true);

        $response = $this->json('GET', '/api/books');
        $this->assertStatus(200);

        $response->assertJsonStructure(
            [
                [
                    'id', 'title', 'author', 'order', 'created_at', 'updated_at'
                ]
            ]
        );






    }
}
