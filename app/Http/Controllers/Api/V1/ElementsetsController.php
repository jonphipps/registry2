<?php

namespace App\Http\Controllers\Api\V1;

use App\Elementset;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreElementsetsRequest;
use App\Http\Requests\UpdateElementsetsRequest;
use Yajra\Datatables\Datatables;

class ElementsetsController extends Controller
{
    public function index()
    {
        return Elementset::all();
    }

    public function show($id)
    {
        return Elementset::findOrFail($id);
    }

    public function update(UpdateElementsetsRequest $request, $id)
    {
        $elementset = Elementset::findOrFail($id);
        $elementset->update($request->all());

        return $elementset;
    }

    public function store(StoreElementsetsRequest $request)
    {
        $elementset = Elementset::create($request->all());

        return $elementset;
    }

    public function destroy($id)
    {
        $elementset = Elementset::findOrFail($id);
        $elementset->delete();
        return '';
    }
}
