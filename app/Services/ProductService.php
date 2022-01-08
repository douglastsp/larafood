<?php 

namespace App\Services;

use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;

class ProductService
{
    protected $productRepository;
    protected $tenantRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        TenantRepositoryInterface $tenantRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->tenantRepository = $tenantRepository;
    }

    public function getProductsByTenatUuid(String $uuid, Array $categories)
    {
        $tenant = $this->tenantRepository->getTenantByUuid($uuid);

        return $this->productRepository->getProductsByTenantId($tenant->id, $categories);
    }

    public function getProductByFlag(String $flag)
    {
        return $this->productRepository->getProductByFlag($flag);
    }
}
