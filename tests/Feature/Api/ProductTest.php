<?php

namespace Tests\Feature\Api;

use App\Models\Product;
use App\Models\Tenant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
     /**
     * Error get products by tenant.
     *
     * @return void
     */
    public function testGetProductsError()
    {
        $response = $this->getJson('/api/v1/products');
        // $response->dump();

        $response->assertStatus(422);
    }
    /**
     *  get products by tenant.
     *
     * @return void
     */
    public function testGetAllProductsByTenant()
    {
        $tenant = factory(Tenant::class)->create();
        $response = $this->getJson("/api/v1/products?token_company={$tenant->uuid}");
        // $response->dump();

        $response->assertStatus(200);
    }
    /**
     *  error get categorie by uuid by tenant.
     *
     * @return void
     */
    public function testErrorGetProductByTenant()
    {
        $product = 'fake_value';
        $tenant = factory(Tenant::class)->create();
        $response = $this->getJson("/api/v1/products/{$product}?token_company={$tenant->uuid}");
        // $response->dump();

        $response->assertStatus(404);
    }
    /**
     *  get categorie by uuid by tenant.
     *
     * @return void
     */
    public function testGetProductByTenant()
    {
        $product = factory(Product::class)->create();
        $tenant = factory(Tenant::class)->create();
        $response = $this->getJson("/api/v1/products/{$product->uuid}?token_company={$tenant->uuid}");
        // $response->dump();

        $response->assertStatus(200);
    }
}
