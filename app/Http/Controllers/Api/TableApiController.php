<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Http\Resources\TableResource;
use App\Services\TableService;

class TableApiController extends Controller
{
    protected $tableService;

    public function __construct(TableService $tableService)
    {
        $this->tableService = $tableService;
    }

    public function tablesByTenant(TenantFormRequest $request)
    {
        // if (!request->token_company) {
        //     return response()->json(['message' => 'Token not found'], 404);
        // }

        $tables = $this->tableService->getTablesByUuid($request->token_company);

        return TableResource::collection($tables);
    }

    public function show(TenantFormRequest $request, String $identify)
    {
        if (!$table = $this->tableService->getTableByUuid($identify)) {
            return response()->json(['message', 'Table not found'], 404);
        }

        return new TableResource($table);
    }
}
