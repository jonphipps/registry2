<?php

namespace App\Http\Controllers\Api\V1;

use App\Statement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStatementsRequest;
use App\Http\Requests\UpdateStatementsRequest;
use Yajra\Datatables\Datatables;

class StatementsController extends Controller
{
    public function index()
    {
        return Statement::all();
    }

    public function show($id)
    {
        return Statement::findOrFail($id);
    }

    public function update(UpdateStatementsRequest $request, $id)
    {
        $statement = Statement::findOrFail($id);
        $statement->update($request->all());

        return $statement;
    }

    public function store(StoreStatementsRequest $request)
    {
        $statement = Statement::create($request->all());

        return $statement;
    }

    public function destroy($id)
    {
        $statement = Statement::findOrFail($id);
        $statement->delete();
        return '';
    }
}
