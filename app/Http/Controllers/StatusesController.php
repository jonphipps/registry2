<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreStatusesRequest;
use App\Http\Requests\UpdateStatusesRequest;
use Yajra\Datatables\Datatables;

class StatusesController extends Controller
{
    /**
     * Display a listing of Status.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('status_access')) {
            return abort(401);
        }
        
        if (request()->ajax()) {
            $query = Status::query();
            $table = Datatables::of($query);
            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) {
                $gateKey  = 'status_';
                $routeKey = 'statuses';

                return view('actionsTemplate', compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('dispay_order', function ($row) {
                return $row->dispay_order ? $row->dispay_order : '';
            });
            $table->editColumn('display_name', function ($row) {
                return $row->display_name ? $row->display_name : '';
            });
            $table->editColumn('uri', function ($row) {
                return $row->uri ? $row->uri : '';
            });

            return $table->make(true);
        }

        return view('statuses.index');
    }

    /**
     * Show the form for creating new Status.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('status_create')) {
            return abort(401);
        }
        return view('statuses.create');
    }

    /**
     * Store a newly created Status in storage.
     *
     * @param  \App\Http\Requests\StoreStatusesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStatusesRequest $request)
    {
        if (! Gate::allows('status_create')) {
            return abort(401);
        }
        $status = Status::create($request->all());

        return redirect()->route('statuses.index');
    }


    /**
     * Show the form for editing Status.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('status_edit')) {
            return abort(401);
        }
        $status = Status::findOrFail($id);

        return view('statuses.edit', compact('status'));
    }

    /**
     * Update Status in storage.
     *
     * @param  \App\Http\Requests\UpdateStatusesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStatusesRequest $request, $id)
    {
        if (! Gate::allows('status_edit')) {
            return abort(401);
        }
        $status = Status::findOrFail($id);
        $status->update($request->all());

        return redirect()->route('statuses.index');
    }


    /**
     * Display Status.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('status_view')) {
            return abort(401);
        }
        $status = Status::findOrFail($id);

        return view('statuses.show', compact('status'));
    }


    /**
     * Remove Status from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('status_delete')) {
            return abort(401);
        }
        $status = Status::findOrFail($id);
        $status->delete();

        return redirect()->route('statuses.index');
    }

    /**
     * Delete all selected Status at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('status_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Status::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
