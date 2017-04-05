<?php

namespace App\Http\Controllers\Api\V1;

use App\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProfilesRequest;
use App\Http\Requests\UpdateProfilesRequest;
use Yajra\Datatables\Datatables;

class ProfilesController extends Controller
{
    public function index()
    {
        return Profile::all();
    }

    public function show($id)
    {
        return Profile::findOrFail($id);
    }

    public function update(UpdateProfilesRequest $request, $id)
    {
        $profile = Profile::findOrFail($id);
        $profile->update($request->all());

        return $profile;
    }

    public function store(StoreProfilesRequest $request)
    {
        $profile = Profile::create($request->all());

        return $profile;
    }

    public function destroy($id)
    {
        $profile = Profile::findOrFail($id);
        $profile->delete();
        return '';
    }
}
