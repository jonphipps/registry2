<?php

namespace App\Http\Controllers;

use App\Import;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreImportsRequest;
use App\Http\Requests\UpdateImportsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Yajra\Datatables\Datatables;

class ImportsController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Import.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('import_access')) {
            return abort(401);
        }
        
        if (request()->ajax()) {
            $query = Import::query();
            $query->with("user");
            $query->with("vocabulary");
            $query->with("elementset");
            $query->with("batch");
            $table = Datatables::of($query);
            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) {
                $gateKey  = 'import_';
                $routeKey = 'imports';

                return view('actionsTemplate', compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('map', function ($row) {
                return $row->map ? $row->map : '';
            });
            $table->editColumn('user.name', function ($row) {
                return $row->user ? $row->user->name : '';
            });
            $table->editColumn('vocabulary.label', function ($row) {
                return $row->vocabulary ? $row->vocabulary->label : '';
            });
            $table->editColumn('elementset.label', function ($row) {
                return $row->elementset ? $row->elementset->label : '';
            });
            $table->editColumn('source_file_name', function ($row) {
                if($row->source_file_name) { return '<a href="'.asset('uploads/'.$row->source_file_name) .'" target="_blank">Download file</a>'; };
            });
            $table->editColumn('file_name', function ($row) {
                return $row->file_name ? $row->file_name : '';
            });
            $table->editColumn('file_type', function ($row) {
                return $row->file_type ? $row->file_type : '';
            });
            $table->editColumn('results', function ($row) {
                return $row->results ? $row->results : '';
            });
            $table->editColumn('total_processed_count', function ($row) {
                return $row->total_processed_count ? $row->total_processed_count : '';
            });
            $table->editColumn('error_count', function ($row) {
                return $row->error_count ? $row->error_count : '';
            });
            $table->editColumn('success_count', function ($row) {
                return $row->success_count ? $row->success_count : '';
            });
            $table->editColumn('batch.run_description', function ($row) {
                return $row->batch ? $row->batch->run_description : '';
            });

            return $table->make(true);
        }

        return view('imports.index');
    }

    /**
     * Show the form for creating new Import.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('import_create')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::get()->pluck('name', 'id')->prepend('Please select', ''),
            'vocabularies' => \App\Vocabulary::get()->pluck('label', 'id')->prepend('Please select', ''),
            'elementsets' => \App\Elementset::get()->pluck('label', 'id')->prepend('Please select', ''),
            'batches' => \App\Batch::get()->pluck('run_description', 'id')->prepend('Please select', ''),
        ];

        return view('imports.create', $relations);
    }

    /**
     * Store a newly created Import in storage.
     *
     * @param  \App\Http\Requests\StoreImportsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreImportsRequest $request)
    {
        if (! Gate::allows('import_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $import = Import::create($request->all());

        return redirect()->route('imports.index');
    }


    /**
     * Show the form for editing Import.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('import_edit')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::get()->pluck('name', 'id')->prepend('Please select', ''),
            'vocabularies' => \App\Vocabulary::get()->pluck('label', 'id')->prepend('Please select', ''),
            'elementsets' => \App\Elementset::get()->pluck('label', 'id')->prepend('Please select', ''),
            'batches' => \App\Batch::get()->pluck('run_description', 'id')->prepend('Please select', ''),
        ];

        $import = Import::findOrFail($id);

        return view('imports.edit', compact('import') + $relations);
    }

    /**
     * Update Import in storage.
     *
     * @param  \App\Http\Requests\UpdateImportsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateImportsRequest $request, $id)
    {
        if (! Gate::allows('import_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $import = Import::findOrFail($id);
        $import->update($request->all());

        return redirect()->route('imports.index');
    }


    /**
     * Display Import.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('import_view')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::get()->pluck('name', 'id')->prepend('Please select', ''),
            'vocabularies' => \App\Vocabulary::get()->pluck('label', 'id')->prepend('Please select', ''),
            'elementsets' => \App\Elementset::get()->pluck('label', 'id')->prepend('Please select', ''),
            'batches' => \App\Batch::get()->pluck('run_description', 'id')->prepend('Please select', ''),
        ];

        $import = Import::findOrFail($id);

        return view('imports.show', compact('import') + $relations);
    }


    /**
     * Remove Import from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('import_delete')) {
            return abort(401);
        }
        $import = Import::findOrFail($id);
        $import->delete();

        return redirect()->route('imports.index');
    }

    /**
     * Delete all selected Import at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('import_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Import::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
