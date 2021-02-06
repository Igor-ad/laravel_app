<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testCategoryCreate()
    {
        $this->withExceptionHandling();

        $category = [
            "id" => 1,
            "title" => "Cat_1",
            "description" => "Test_cat_1"
        ];
        $this->post('/categories', $category);
        $this->assertDatabaseHas('categories', $category);
        $this->get('/categories')
            ->assertSee($category['title']);
    }
}
