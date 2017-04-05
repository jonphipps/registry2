<?php

namespace App\Http\Controllers\Api\V1;

use App\Translation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTranslationsRequest;
use App\Http\Requests\UpdateTranslationsRequest;
use Yajra\Datatables\Datatables;

class TranslationsController extends Controller
{
    public function index()
    {
        return Translation::all();
    }

    public function show($id)
    {
        return Translation::findOrFail($id);
    }

    public function update(UpdateTranslationsRequest $request, $id)
    {
        $translation = Translation::findOrFail($id);
        $translation->update($request->all());

        return $translation;
    }

    public function store(StoreTranslationsRequest $request)
    {
        $translation = Translation::create($request->all());

        return $translation;
    }

    public function destroy($id)
    {
        $translation = Translation::findOrFail($id);
        $translation->delete();
        return '';
    }
}
