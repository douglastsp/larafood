<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProfile;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $repository;

    public function __construct(Profile $profile)
    {
        $this->repository = $profile;
        $this->middleware(['can:Profiles']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = $this->repository->paginate();

        return view('admin.pages.profiles.index', [
            'profiles' => $profiles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProfile $request)
    {
        //
        $this->repository->create($request->all());

        return redirect()->route('profiles.index')->with('message', 'Perfil criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $profile = $this->repository->find($id);

        return view('admin.pages.profiles.show', [
           'profile' => $profile
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
        //
        $profile = $this->repository->find($id);

        if (empty($profile))
            return redirect()->back();

        return view('admin.pages.profiles.edit', [
           'profile' => $profile
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProfile $request, $id)
    {
        //
        $profile = $this->repository->find($id);

        if (empty($profile))
            return redirect()->back();

        $profile->update($request->all());

        return redirect()->route('profiles.show', $profile->id)->with('message', 'Perfil alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $profile = $this->repository->find($id);

        if (empty($profile))
            return redirect()->back();

        $profile->delete();
        return redirect()->route('profiles.index')->with('message', 'Perfil deletado com sucesso!');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $profiles = $this->repository->search($request->filter);

        return view('admin.pages.profiles.index', [
            'profiles' => $profiles,
            'filters' =>$filters
        ]);
    }
}
