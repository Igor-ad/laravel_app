<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
//    use RefreshDatabase;


//    public function testCategoryEmpty()
//    {
//        $this->get('/categories')
//            ->assertSee('No Categories');
//    }

    public function testUserCanSeeCategory()
    {
        $category = Category::factory()->create();
        $this->get('/categories')
            ->assertSee($category['title']);
    }

    public function testCreateCategory()
    {
        $category = Category::factory()->raw();
        $this->post('/categories', $category);
        $this->assertDatabaseHas('categories', $category);
        $this->get('/categories')
            ->assertSee($category['title']);
    }

    public function testCreateCategoryRequiredFields()
    {
        $this->post('/categories')
            ->assertSessionHasErrors(['title', 'description']);
    }

    public function testDeleteCategory()
    {
        $category = Category::factory()->create();
        $id = $category['id'];
        $this->get('/categories/delete/' . $id);
        $this->get('/categories')
            ->assertDontSee($category['title']);
    }

    public function testUpdateCategory()
    {
        $category = Category::factory()->create();
        $id = $category['id'];
        $categoryNew = [
            "title" => "Cat_177",
            "description" => "Test_cat_177"
        ];
        $this->post('/categories/' . $id, $categoryNew);
        $this->assertDatabaseHas('categories', $categoryNew);
        $this->get('/categories')
            ->assertSee($categoryNew['title']);
    }
}
