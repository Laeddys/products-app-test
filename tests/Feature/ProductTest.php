<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_product()
    {
        $response = $this->post('/products', [
            'title' => 'Test product',
            'description' => 'Desc',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('products', [
            'title' => 'Test product'
        ]);
    }

    public function test_search_works()
    {
        Product::factory()->create(['title' => 'Apple']);
        Product::factory()->create(['title' => 'Samsung']);

        $response = $this->get('/products?search=App');

        $response->assertSee('Apple');
        $response->assertDontSee('Samsung');
    }

    public function api_returns_json_resource_collection()
    {

        Product::factory()->count(3)->create();

        $response = $this->getJson('/api/products');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'title',
                    'description',
                    'created_at',
                    'updated_at',
                ]
            ]
        ]);
    }
}
