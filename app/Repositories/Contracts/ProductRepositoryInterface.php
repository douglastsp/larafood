<?php

namespace App\Repositories\Contracts;

interface ProductRepositoryInterface
{
    public function getProductsByTenantId(Int $id, Array $categories);

    public function getProductByUuid(String $identify);
}
