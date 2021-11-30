<?php

namespace App\Observers;

use App\Models\Tenant;
use Illuminate\Support\Str;

class TenantObserver
{
    /**
     * Handle the tenant "creating" event.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return void
     */
    public function creating(Tenant $tenant)
    {
        /**
         * Everytime a tenant was created, we create a uuid and url based on the name
         */
        $tenant->uuid = Str::uuid();
        $tenant->url = Str::kebab($tenant->name);
    }
    
    /**
     * Handle the tenant "updating" event.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return void
     */
    public function updating(Tenant $tenant)
    {
        /**
         * Everytime a tenant was updated, we update a url based on the new name
         */
        $tenant->url = Str::kebab($tenant->name);
    }
}
