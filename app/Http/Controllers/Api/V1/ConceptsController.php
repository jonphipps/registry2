<?php

namespace App\Http\Controllers\Api\V1;

use App\Concept;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConceptsRequest;
use App\Http\Requests\UpdateConceptsRequest;
use Yajra\Datatables\Datatables;

class ConceptsController extends Controller
{
    public function index()
    {
        return Concept::all();
    }

    public function show($id)
    {
        return Concept::findOrFail($id);
    }

    public function update(UpdateConceptsRequest $request, $id)
    {
        $concept = Concept::findOrFail($id);
        $concept->update($request->all());

        return $concept;
    }

    public function store(StoreConceptsRequest $request)
    {
        $concept = Concept::create($request->all());

        return $concept;
    }

    public function destroy($id)
    {
        $concept = Concept::findOrFail($id);
        $concept->delete();
        return '';
    }
}
