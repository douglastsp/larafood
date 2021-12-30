<?php 

namespace App\Repositories\Contracts;

interface TenantRepositoryInterface
{
    public function getAllTenants(Int $perPage);

    public function getTenantByUuid(string $uuid);
}
