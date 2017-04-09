<?php

namespace App\Http\Controllers\Api\V1;

use App\Release;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReleasesRequest;
use App\Http\Requests\UpdateReleasesRequest;
use Yajra\Datatables\Datatables;

class ReleasesController extends Controller
{
    public function index()
    {
        return Release::all();
    }

    public function show($id)
    {
        return Release::findOrFail($id);
    }

    public function update(UpdateReleasesRequest $request, $id)
    {
        $release = Release::findOrFail($id);
        $release->update($request->all());

        return $release;
    }

    public function store(StoreReleasesRequest $request)
    {
        $release = Release::create($request->all());

        return $release;
    }

    public function destroy($id)
    {
        $release = Release::findOrFail($id);
        $release->delete();
        return '';
    }
}
