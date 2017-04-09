<?php

namespace App\Http\Controllers\Api\V1;

use App\Export;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExportsRequest;
use App\Http\Requests\UpdateExportsRequest;
use Yajra\Datatables\Datatables;

class ExportsController extends Controller
{
    public function index()
    {
        return Export::all();
    }

    public function show($id)
    {
        return Export::findOrFail($id);
    }

    public function update(UpdateExportsRequest $request, $id)
    {
        $export = Export::findOrFail($id);
        $export->update($request->all());

        return $export;
    }

    public function store(StoreExportsRequest $request)
    {
        $export = Export::create($request->all());

        return $export;
    }

    public function destroy($id)
    {
        $export = Export::findOrFail($id);
        $export->delete();
        return '';
    }
}
