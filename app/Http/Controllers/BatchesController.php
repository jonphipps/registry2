<?php

namespace App\Http\Controllers;

use App\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreBatchesRequest;
use App\Http\Requests\UpdateBatchesRequest;
use Yajra\Datatables\Datatables;

class BatchesController extends Controller
{
    /**
     * Display a listing of Batch.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('batch_access')) {
            return abort(401);
        }
        
        if (request()->ajax()) {
            $query = Batch::query();
            $table = Datatables::of($query);
            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) {
                $gateKey  = 'batch_';
                $routeKey = 'batches';

                return view('actionsTemplate', compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('run_time', function ($row) {
                return $row->run_time ? $row->run_time : '';
            });
            $table->editColumn('run_description', function ($row) {
                return $row->run_description ? $row->run_description : '';
            });

            return $table->make(true);
        }

        return view('batches.index');
    }

    /**
     * Show the form for creating new Batch.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('batch_create')) {
            return abort(401);
        }
        return view('batches.create');
    }

    /**
     * Store a newly created Batch in storage.
     *
     * @param  \App\Http\Requests\StoreBatchesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBatchesRequest $request)
    {
        if (! Gate::allows('batch_create')) {
            return abort(401);
        }
        $batch = Batch::create($request->all());

        return redirect()->route('batches.index');
    }


    /**
     * Show the form for editing Batch.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('batch_edit')) {
            return abort(401);
        }
        $batch = Batch::findOrFail($id);

        return view('batches.edit', compact('batch'));
    }

    /**
     * Update Batch in storage.
     *
     * @param  \App\Http\Requests\UpdateBatchesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBatchesRequest $request, $id)
    {
        if (! Gate::allows('batch_edit')) {
            return abort(401);
        }
        $batch = Batch::findOrFail($id);
        $batch->update($request->all());

        return redirect()->route('batches.index');
    }


    /**
     * Display Batch.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('batch_view')) {
            return abort(401);
        }
        $relations = [
            'imports' => \App\Import::where('batch_id', $id)->get(),
        ];

        $batch = Batch::findOrFail($id);

        return view('batches.show', compact('batch') + $relations);
    }


    /**
     * Remove Batch from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('batch_delete')) {
            return abort(401);
        }
        $batch = Batch::findOrFail($id);
        $batch->delete();

        return redirect()->route('batches.index');
    }

    /**
     * Delete all selected Batch at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('batch_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Batch::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
