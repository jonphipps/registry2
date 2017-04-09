<?php

namespace App\Http\Controllers;

use App\Datatype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreDatatypesRequest;
use App\Http\Requests\UpdateDatatypesRequest;
use Yajra\Datatables\Datatables;

class DatatypesController extends Controller
{
    /**
     * Display a listing of Datatype.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('datatype_access')) {
            return abort(401);
        }
        
        if (request()->ajax()) {
            $query = Datatype::query();
            $table = Datatables::of($query);
            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) {
                $gateKey  = 'datatype_';
                $routeKey = 'datatypes';

                return view('actionsTemplate', compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('label', function ($row) {
                return $row->label ? $row->label : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });

            return $table->make(true);
        }

        return view('datatypes.index');
    }

    /**
     * Show the form for creating new Datatype.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('datatype_create')) {
            return abort(401);
        }
        return view('datatypes.create');
    }

    /**
     * Store a newly created Datatype in storage.
     *
     * @param  \App\Http\Requests\StoreDatatypesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDatatypesRequest $request)
    {
        if (! Gate::allows('datatype_create')) {
            return abort(401);
        }
        $datatype = Datatype::create($request->all());

        return redirect()->route('datatypes.index');
    }


    /**
     * Show the form for editing Datatype.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('datatype_edit')) {
            return abort(401);
        }
        $datatype = Datatype::findOrFail($id);

        return view('datatypes.edit', compact('datatype'));
    }

    /**
     * Update Datatype in storage.
     *
     * @param  \App\Http\Requests\UpdateDatatypesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDatatypesRequest $request, $id)
    {
        if (! Gate::allows('datatype_edit')) {
            return abort(401);
        }
        $datatype = Datatype::findOrFail($id);
        $datatype->update($request->all());

        return redirect()->route('datatypes.index');
    }


    /**
     * Display Datatype.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('datatype_view')) {
            return abort(401);
        }
        $datatype = Datatype::findOrFail($id);

        return view('datatypes.show', compact('datatype'));
    }


    /**
     * Remove Datatype from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('datatype_delete')) {
            return abort(401);
        }
        $datatype = Datatype::findOrFail($id);
        $datatype->delete();

        return redirect()->route('datatypes.index');
    }

    /**
     * Delete all selected Datatype at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('datatype_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Datatype::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
