<?php

namespace App\Http\Controllers\Api\V1;

use App\Import;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreImportsRequest;
use App\Http\Requests\UpdateImportsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Yajra\Datatables\Datatables;

class ImportsController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        return Import::all();
    }

    public function show($id)
    {
        return Import::findOrFail($id);
    }

    public function update(UpdateImportsRequest $request, $id)
    {
        $request = $this->saveFiles($request);
        $import = Import::findOrFail($id);
        $import->update($request->all());

        return $import;
    }

    public function store(StoreImportsRequest $request)
    {
        $request = $this->saveFiles($request);
        $import = Import::create($request->all());

        return $import;
    }

    public function destroy($id)
    {
        $import = Import::findOrFail($id);
        $import->delete();
        return '';
    }
}
