<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
//    use RefreshDatabase;

//    public function testUserCanSeeProduct()
//    {
//        $user = User::factory()->create();
//        $product = Product::factory()->create();
//        $this->actingAs($user)
//            ->get('/products')
//            ->assertSee($product['title']);
//    }

    public function testCreateProduct()
    {
        $user = User::factory()->create();
        $product = Product::factory()->raw();
        $product['category_id'] = Category::factory()->create()->id;
        $this->post('/products', $product);
        $this->assertDatabaseHas('products', $product);
        $this->actingAs($user)
            ->get('/products')
            ->assertSee($product['title']);
    }


    public function testCreateProductRequiredFields()
    {
        $this->post('/products')
            ->assertSessionHasErrors(['title', 'description', 'price']);
    }

    public function testUpdateProduct()
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();
        $productNew = [
            "title" => "Product_987",
            "description" => "Test_prod_987",
            "price" => 50.55,
            'category_id' => Category::factory()->create()->id
        ];
        $this->post('/products/' . $product['id'], $productNew);
        $this->assertDatabaseHas('products', $productNew);
        $this->actingAs($user)
            ->get('/products')
            ->assertSee($productNew['title']);
    }

    public function testDeleteProduct()
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();
        $productNew = [
            "title" => $product['title'],
            "description" => $product['description'],
            "price" => $product['price'],
            'category_id' => Category::factory()->create()->id
        ];
        $this->post('/products/' . $product['id'], $productNew);
        $this->assertDatabaseHas('products', $productNew);
        $this->actingAs($user)
            ->get('/products/delete/' . $product['id']);
        $this->get('/products')
            ->assertDontSee($product['title']);
    }
}
