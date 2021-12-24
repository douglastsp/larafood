<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateTenant;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TenantController extends Controller
{
    private $repository;

    public function __construct(Tenant $tenant)
    {
        $this->repository = $tenant;
        $this->middleware(['can:Tenants']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenants = $this->repository->latest()->paginate(10);

        return view('admin.pages.tenants.index', [
            'tenants' => $tenants
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$tenant = $this->repository->with('plan')->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.tenants.show', [
            'tenant' => $tenant
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$tenant = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.tenants.edit', [
            'tenant' => $tenant
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\StoreUpdateTenant  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateTenant $request, $id)
    {
        if (!$tenant = $this->repository->find($id)) {
            return redirect()->back();
        }

        $data = $request->all();
        
        if ($request->hasFile('logo') && $request->logo->isValid()) {
            if (Storage::exists($tenant->logo)) {
                Storage::delete($tenant->logo);
            }

            $data['logo'] = $request->logo->store("tenants/{$tenant->uuid}/tenants");
        }

        $tenant->update($data);

        return redirect()->route('tenants.index')->with('message', 'Empresa atualizada com sucesso.');
    }


    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $tenants = $this->repository->search($request->filter);

        return view('admin.pages.tenants.index', [
            'tenants' => $tenants,
            'filters' => $filters
        ]);
    }
}
