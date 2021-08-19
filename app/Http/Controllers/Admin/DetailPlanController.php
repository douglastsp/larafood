<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{
    protected $repository;
    protected $plan;

    public function __construct(DetailPlan $detailPlan, Plan $plan)
    {
        $this->repository = $detailPlan;
        $this->plan = $plan;
    }

    public function index($urlPlan)
    {
        if (empty($plan = $this->plan->where('url', $urlPlan)->first())) {
            return redirect()->back();
        }

        $details = $plan->details()->paginate();

        return view('admin.pages.plans.details.index', [
            'plan' => $plan,
            'details' => $details
        ]);

    }

    public function create($urlPlan)
    {
        if (empty($plan = $this->plan->where('url', $urlPlan)->first())) {
            return redirect()->back();
        }

        return view('admin.pages.plans.details.create', [
            'plan' => $plan
        ]);
    }

    public function store(Request $request, $urlPlan)
    {
        if (empty($plan = $this->plan->where('url', $urlPlan)->first())) {
            return redirect()->back();
        }

        $plan->details()->create($request->all());

        return redirect()->route('details.plan.index', $plan->url);
    }
}
