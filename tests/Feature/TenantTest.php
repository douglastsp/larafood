<?php

namespace Tests\Feature;

use App\Models\Tenant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TenantTest extends TestCase
{
    /**
     * Get all Tenants
     *
     * @return void
     */
    public function testGetAllTenants()
    {
        factory(Tenant::class, 10)->create();

        $response = $this->getJson('/api/v1/tenants');
        //$response->dump(); //To see what we received after access this endpoint

        $response->assertStatus(200)
                    ->assertJsonCount(10, 'data');
    }
    /**
     * Get Error Single Tenant
     *
     * @return void
     */
    public function testErrorGetSingleTenant()
    {
        // factory(Tenant::class)->create();
        $tenant = 'fake_value';

        $response = $this->getJson("/api/v1/tenants/{$tenant}");
        //$response->dump(); //To see what we received after access this endpoint

        $response->assertStatus(404);
    }
    /**
     * Get by Single Tenant
     *
     * @return void
     */
    public function testGetSingleByTenant()
    {
        
        $tenant = factory(Tenant::class)->create();

        $response = $this->getJson("/api/v1/tenants/{$tenant->uuid}");
        //$response->dump(); //To see what we received after access this endpoint

        $response->assertStatus(200);
    }
}
