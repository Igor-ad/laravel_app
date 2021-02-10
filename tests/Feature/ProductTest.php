<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
//    use RefreshDatabase;

    public function testUserCanSeeProduct()
    {
        $product = Product::factory()->create();
        $this->get('/products')
            ->assertSee($product['title']);
    }

    public function testCreateProduct()
    {
        $product = Product::factory()->raw();
        $this->post('/products', $product);
        $this->assertDatabaseHas('products', $product);
        $this->get('/products')
            ->assertSee($product['title']);
    }

    public function testDeleteProduct()
    {
        $product = Product::factory()->create();
        $id = $product['id'];
        $this->get('/products/delete/' . $id);
        $this->get('/products')
            ->assertDontSee($product['title']);
    }

    public function testCreateProductRequiredFields()
    {
        $this->post('/products')
            ->assertSessionHasErrors(['title', 'description', 'price']);
    }

    public function testUpdateProduct()
    {
        $product = Product::factory()->create();
        $id = $product['id'];
        $productNew = [
            "title" => "Product_987",
            "description" => "Test_prod_987",
            "price" => 50.55
        ];
        $this->post('/products/' . $id, $productNew);
        $this->assertDatabaseHas('products', $productNew);
        $this->get('/products')
            ->assertSee($productNew['title']);
    }
}
