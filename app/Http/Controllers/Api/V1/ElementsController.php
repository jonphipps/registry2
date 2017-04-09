<?php

namespace App\Http\Controllers\Api\V1;

use App\Element;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreElementsRequest;
use App\Http\Requests\UpdateElementsRequest;
use Yajra\Datatables\Datatables;

class ElementsController extends Controller
{
    public function index()
    {
        return Element::all();
    }

    public function show($id)
    {
        return Element::findOrFail($id);
    }

    public function update(UpdateElementsRequest $request, $id)
    {
        $element = Element::findOrFail($id);
        $element->update($request->all());

        return $element;
    }

    public function store(StoreElementsRequest $request)
    {
        $element = Element::create($request->all());

        return $element;
    }

    public function destroy($id)
    {
        $element = Element::findOrFail($id);
        $element->delete();
        return '';
    }
}
