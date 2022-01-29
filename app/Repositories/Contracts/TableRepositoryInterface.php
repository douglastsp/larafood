<?php 

namespace App\Repositories\Contracts;

interface TableRepositoryInterface
{
    public function getTablesByTenantUuid(String $uuid);
    public function getTablesByTenantId(Int $id);
    public function getTableByUuid(String $identify);
}
