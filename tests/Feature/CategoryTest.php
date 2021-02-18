<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function testUserCanSeeCategory()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();
        $this->actingAs($user)
            ->get('/categories')
            ->assertSee($category['title']);
    }

    public function testCreateCategory()
    {
        $user = User::factory()->create();
        $category = Category::factory()->raw();
        $this->post('/categories', $category);
        $this->assertDatabaseHas('categories', $category);
        $this->actingAs($user)
            ->get('/categories')
            ->assertSee($category['title']);
    }

    public function testCreateCategoryRequiredFields()
    {
        $user = User::factory()->create();
        $this->actingAs($user)
            ->post('/categories')
            ->assertSessionHasErrors(['title', 'description']);
    }

    public function testDeleteCategory()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();
        $id = $category['id'];
        $this->actingAs($user)
            ->get('/categories/delete/' . $id);
        $this->get('/categories')
            ->assertDontSee($category['title']);
    }

    public function testUpdateCategory()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();
        $id = $category['id'];
        $categoryNew = [
            "title" => "Cat_177",
            "description" => "Test_cat_177"
        ];
        $this->post('/categories/' . $id, $categoryNew);
        $this->assertDatabaseHas('categories', $categoryNew);
        $this->actingAs($user)
            ->get('/categories')
            ->assertSee($categoryNew['title']);
    }
}
