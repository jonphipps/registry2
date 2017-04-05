<?php

namespace App\Http\Controllers\Api\V1;

use App\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePropertiesRequest;
use App\Http\Requests\UpdatePropertiesRequest;
use Yajra\Datatables\Datatables;

class PropertiesController extends Controller
{
    public function index()
    {
        return Property::all();
    }

    public function show($id)
    {
        return Property::findOrFail($id);
    }

    public function update(UpdatePropertiesRequest $request, $id)
    {
        $property = Property::findOrFail($id);
        $property->update($request->all());

        return $property;
    }

    public function store(StorePropertiesRequest $request)
    {
        $property = Property::create($request->all());

        return $property;
    }

    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        $property->delete();
        return '';
    }
}
