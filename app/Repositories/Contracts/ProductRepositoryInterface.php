<?php

namespace App\Repositories\Contracts;

interface ProductRepositoryInterface
{
    public function getProductsByTenantId(Int $id, Array $categories);

    public function getProductByFlag(String $flag);
}
