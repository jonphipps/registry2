<?php

namespace App\Http\Controllers\Api\V1;

use App\Datatype;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDatatypesRequest;
use App\Http\Requests\UpdateDatatypesRequest;
use Yajra\Datatables\Datatables;

class DatatypesController extends Controller
{
    public function index()
    {
        return Datatype::all();
    }

    public function show($id)
    {
        return Datatype::findOrFail($id);
    }

    public function update(UpdateDatatypesRequest $request, $id)
    {
        $datatype = Datatype::findOrFail($id);
        $datatype->update($request->all());

        return $datatype;
    }

    public function store(StoreDatatypesRequest $request)
    {
        $datatype = Datatype::create($request->all());

        return $datatype;
    }

    public function destroy($id)
    {
        $datatype = Datatype::findOrFail($id);
        $datatype->delete();
        return '';
    }
}
