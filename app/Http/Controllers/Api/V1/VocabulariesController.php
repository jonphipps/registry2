<?php

namespace App\Http\Controllers\Api\V1;

use App\Vocabulary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVocabulariesRequest;
use App\Http\Requests\UpdateVocabulariesRequest;
use Yajra\Datatables\Datatables;

class VocabulariesController extends Controller
{
    public function index()
    {
        return Vocabulary::all();
    }

    public function show($id)
    {
        return Vocabulary::findOrFail($id);
    }

    public function update(UpdateVocabulariesRequest $request, $id)
    {
        $vocabulary = Vocabulary::findOrFail($id);
        $vocabulary->update($request->all());

        return $vocabulary;
    }

    public function store(StoreVocabulariesRequest $request)
    {
        $vocabulary = Vocabulary::create($request->all());

        return $vocabulary;
    }

    public function destroy($id)
    {
        $vocabulary = Vocabulary::findOrFail($id);
        $vocabulary->delete();
        return '';
    }
}
