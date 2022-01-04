<?php 

namespace App\Repositories\Contracts;

interface CategoryRepositoryInterface
{
    public function getCategoriesByTenantUuid(String $uuid);
    public function getCategoriesByTenantId(Int $id);
    public function getCategoryByUrl(String $url);
}
