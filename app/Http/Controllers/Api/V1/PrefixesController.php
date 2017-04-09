<?php

namespace App\Http\Controllers\Api\V1;

use App\Prefix;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePrefixesRequest;
use App\Http\Requests\UpdatePrefixesRequest;
use Yajra\Datatables\Datatables;

class PrefixesController extends Controller
{
    public function index()
    {
        return Prefix::all();
    }

    public function show($id)
    {
        return Prefix::findOrFail($id);
    }

    public function update(UpdatePrefixesRequest $request, $id)
    {
        $prefix = Prefix::findOrFail($id);
        $prefix->update($request->all());

        return $prefix;
    }

    public function store(StorePrefixesRequest $request)
    {
        $prefix = Prefix::create($request->all());

        return $prefix;
    }

    public function destroy($id)
    {
        $prefix = Prefix::findOrFail($id);
        $prefix->delete();
        return '';
    }
}
