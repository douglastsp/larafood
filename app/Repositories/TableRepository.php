<?php

namespace App\Repositories;

use App\Repositories\Contracts\TableRepositoryInterface;
use Illuminate\Support\Facades\DB;

class TableRepository implements TableRepositoryInterface
{
    protected $table;

    public function __construct()
    {
        $this->table = 'tables';
    }

    public function getTablesByTenantUuid(string $uuid)
    {
        return DB::table($this->table)
            ->join('tenants', 'tenants.id', '=', 'tables.tenant_id')
            ->where('tenants.uuid', $uuid)
            ->select('tables.*')
            ->get();
    }

    public function getTablesByTenantId(int $id)
    {
        return DB::table($this->table)
            ->where('tenant_id', $id)
            ->get();
    }

    public function getTableByUuid(String $identify)
    {
        return DB::table($this->table)->where('uuid', $identify)->first();
    }
}
