<?php

namespace App\Http\Controllers;

use App\Prefix;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StorePrefixesRequest;
use App\Http\Requests\UpdatePrefixesRequest;
use Yajra\Datatables\Datatables;

class PrefixesController extends Controller
{
    /**
     * Display a listing of Prefix.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('prefix_access')) {
            return abort(401);
        }
        
        if (request()->ajax()) {
            $query = Prefix::query();
            $table = Datatables::of($query);
            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) {
                $gateKey  = 'prefix_';
                $routeKey = 'prefixes';

                return view('actionsTemplate', compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('prefix', function ($row) {
                return $row->prefix ? $row->prefix : '';
            });
            $table->editColumn('uri', function ($row) {
                return $row->uri ? $row->uri : '';
            });
            $table->editColumn('rank', function ($row) {
                return $row->rank ? $row->rank : '';
            });

            return $table->make(true);
        }

        return view('prefixes.index');
    }

    /**
     * Show the form for creating new Prefix.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('prefix_create')) {
            return abort(401);
        }
        return view('prefixes.create');
    }

    /**
     * Store a newly created Prefix in storage.
     *
     * @param  \App\Http\Requests\StorePrefixesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrefixesRequest $request)
    {
        if (! Gate::allows('prefix_create')) {
            return abort(401);
        }
        $prefix = Prefix::create($request->all());

        return redirect()->route('prefixes.index');
    }


    /**
     * Show the form for editing Prefix.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('prefix_edit')) {
            return abort(401);
        }
        $prefix = Prefix::findOrFail($id);

        return view('prefixes.edit', compact('prefix'));
    }

    /**
     * Update Prefix in storage.
     *
     * @param  \App\Http\Requests\UpdatePrefixesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePrefixesRequest $request, $id)
    {
        if (! Gate::allows('prefix_edit')) {
            return abort(401);
        }
        $prefix = Prefix::findOrFail($id);
        $prefix->update($request->all());

        return redirect()->route('prefixes.index');
    }


    /**
     * Display Prefix.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('prefix_view')) {
            return abort(401);
        }
        $prefix = Prefix::findOrFail($id);

        return view('prefixes.show', compact('prefix'));
    }


    /**
     * Remove Prefix from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('prefix_delete')) {
            return abort(401);
        }
        $prefix = Prefix::findOrFail($id);
        $prefix->delete();

        return redirect()->route('prefixes.index');
    }

    /**
     * Delete all selected Prefix at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('prefix_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Prefix::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
