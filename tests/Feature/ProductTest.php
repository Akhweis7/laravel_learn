<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_all_products(): void
    {
        Product::factory(3)->create();

        $response = $this->getJson('/api/products');

        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }

    public function test_can_get_single_product(): void
    {
        $product = Product::factory()->create();

        $response = $this->getJson('/api/products/' . $product->id);

        $response->assertStatus(200);
    }

    public function test_cannot_delete_product_without_token(): void
    {
        $product = Product::factory()->create();

        $response = $this->deleteJson('/api/products/' . $product->id);

        $response->assertStatus(401);
    }

    public function test_admin_can_delete_product(): void
    {
        $admin = User::factory()->create(['is_admin' => 1]);
        $product = Product::factory()->create();

        $response = $this->actingAs($admin, 'sanctum')
            ->deleteJson('/api/products/' . $product->id);

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Product deleted']);
    }
}