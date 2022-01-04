<?php

namespace App\Services;

use App\Repositories\Contracts\TableRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;

class TableService
{
    protected $tableRepository;
    protected $tenantRepository;

    public function __construct(
        TableRepositoryInterface $tableRepository,
        TenantRepositoryInterface $tenantRepository
    )
    {
        $this->tableRepository = $tableRepository;
        $this->tenantRepository = $tenantRepository;
    }

    public function getTablesByUuid(String $uuid)
    {
        $tenant = $this->tenantRepository->getTenantByUuid($uuid);

        return $this->tableRepository->getTablesByTenantId($tenant->id);
    }

    public function getTableByUrl(Int $id)
    {
        return $this->tableRepository->getTableById($id);
    }
}
