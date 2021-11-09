<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Profile;

class PlanProfileController extends Controller
{
    protected $plan;
    protected $profile;

    public function __construct(Plan $plan, Profile $profile)
    {
        $this->plan = $plan;
        $this->profile = $profile;
    }

    //
    public function index($idPlan)
    {
        if (!$plan = $this->plan->find($idPlan)) {
            return redirect()->back();
        }

        $profiles = $plan->profiles()->paginate();

        return view('admin.pages.plans.profiles.profiles', [
            'plan' => $plan,
            'profiles' => $profiles
        ]);
    }

    public function plans($idprofile)
    {
        if (!$profile = $this->profile->find($idprofile)) {
            return redirect()->back();
        }

        $plans = $profile->plans()->paginate();

        return view('admin.pages.profiles.plans.plans', [
            'plans' => $plans,
            'profile' => $profile
        ]);
    }

    public function profilesAvailable(Request $request, $idPlan)
    {
        if (!$plan = $this->plan->find($idPlan)) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $profiles = $plan->profilesAvailable($request->filter);

        return view('admin.pages.plans.profiles.available', [
            'plan' => $plan,
            'profiles' => $profiles,
            'filters' => $filters
        ]);
    }

    public function attachProfilesPlan(Request $request, $idPlan)
    {
        if (!$plan = $this->plan->find($idPlan)) {
            return redirect()->back();
        }

        if (empty($request->profiles) || count($request->profiles) === 0){
            return redirect()
                ->back()
                ->with('warning', 'Não há Planos selecionados para vincular a este perfil!');
        }

        $plan->profiles()->attach($request->profiles);

        return redirect()->route('plans.profiles', $idPlan)->with('message', 'Permissões vinculadas com sucesso!');
    }

    public function detachprofilesplan($idPlan, $idprofile)
    {
        $plan = $this->plan->find($idPlan);
        $profile = $this->profile->find($idprofile);

        if (empty($plan) || empty($profile)) {
            return redirect()->back();
        }

        //Detach a permisson from plan
        $plan->profiles()->detach($profile);

        return redirect()->back()->with('message', 'Desvinculado com sucesso!');
    }
}
