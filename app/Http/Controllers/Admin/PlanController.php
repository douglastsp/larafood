<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlan;
use App\Models\Plan;
use Illuminate\Http\Request;

/**
 *
 */
class PlanController extends Controller
{
    /**
     * @var Plan
     */
    private $repository;

    /**
     * @param Plan $plan
     */
    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //get all the plans
        $plans = $this->repository->latest()->paginate(10);

        return view('admin.pages.plans.index', [
            'plans' => $plans
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.pages.plans.create');
    }

    /**
     * @param StoreUpdatePlan $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreUpdatePlan $request)
    {
        //get all information and save on Data Base
        $this->repository->create($request->all());

        //return to index
        return redirect()->route('plans.index');
    }

    /**
     * @param $url
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show($url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if (empty($plan))
            return redirect()->back();

        return view('admin.pages.plans.show', [
            'plan' => $plan
        ]);
    }

    /**
     * @param $url
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destory($url)
    {
        $plan = $this->repository
            ->with('details')
            ->where('url', $url)
            ->first();

        if (empty($plan))
            return redirect()->back();

        if ($plan->details->count() > 0){
            return redirect()
                ->back()
                ->with('error', 'Existem detalhes vinculados a este plano, portanto é necessário excluir os detalhes antes de deletar o plano');
        }

        $plan->delete();

        return redirect()->route('plans.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $plans = $this->repository->search($request->filter);

        return view('admin.pages.plans.index', [
            'plans' => $plans,
            'filters' => $filters
        ]);
    }

    /**
     * @param $url
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit($url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if (empty($plan))
            return redirect()->back();

        return view('admin.pages.plans.edit', [
            'plan' => $plan
        ]);
    }

    /**
     * @param StoreUpdatePlan $request
     * @param $url
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreUpdatePlan $request, $url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if (empty($plan))
            return redirect()->back();

        $plan->update($request->all());

        return redirect()->route('plans.show', $plan->url);
    }
}
