<?php

namespace App\Http\Controllers;

use App\Export;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreExportsRequest;
use App\Http\Requests\UpdateExportsRequest;
use Yajra\Datatables\Datatables;

class ExportsController extends Controller
{
    /**
     * Display a listing of Export.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('export_access')) {
            return abort(401);
        }
        
        if (request()->ajax()) {
            $query = Export::query();
            $query->with("user");
            $query->with("vocabulary");
            $query->with("elementset");
            $query->with("profile");
            $table = Datatables::of($query);
            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) {
                $gateKey  = 'export_';
                $routeKey = 'exports';

                return view('actionsTemplate', compact('row', 'gateKey', 'routeKey'));
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
            $table->editColumn('excude_deprecated', function ($row) {
                return \Form::checkbox("excude_deprecated", 1, $row->excude_deprecated == 1, ["disabled"]);
            });
            $table->editColumn('include_generated', function ($row) {
                return \Form::checkbox("include_generated", 1, $row->include_generated == 1, ["disabled"]);
            });
            $table->editColumn('include_deleted', function ($row) {
                return \Form::checkbox("include_deleted", 1, $row->include_deleted == 1, ["disabled"]);
            });
            $table->editColumn('selected_columns', function ($row) {
                return $row->selected_columns ? $row->selected_columns : '';
            });
            $table->editColumn('selected_language', function ($row) {
                return $row->selected_language ? $row->selected_language : '';
            });
            $table->editColumn('published_english_version', function ($row) {
                return $row->published_english_version ? $row->published_english_version : '';
            });
            $table->editColumn('published_language_version', function ($row) {
                return $row->published_language_version ? $row->published_language_version : '';
            });
            $table->editColumn('last_vocab_update', function ($row) {
                return $row->last_vocab_update ? $row->last_vocab_update : '';
            });
            $table->editColumn('profile.label', function ($row) {
                return $row->profile ? $row->profile->label : '';
            });
            $table->editColumn('file', function ($row) {
                return $row->file ? $row->file : '';
            });
            $table->editColumn('map', function ($row) {
                return $row->map ? $row->map : '';
            });

            return $table->make(true);
        }

        return view('exports.index');
    }

    /**
     * Show the form for creating new Export.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('export_create')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::get()->pluck('name', 'id')->prepend('Please select', ''),
            'vocabularies' => \App\Vocabulary::get()->pluck('label', 'id')->prepend('Please select', ''),
            'elementsets' => \App\Elementset::get()->pluck('label', 'id')->prepend('Please select', ''),
            'profiles' => \App\Profile::get()->pluck('label', 'id')->prepend('Please select', ''),
        ];

        return view('exports.create', $relations);
    }

    /**
     * Store a newly created Export in storage.
     *
     * @param  \App\Http\Requests\StoreExportsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExportsRequest $request)
    {
        if (! Gate::allows('export_create')) {
            return abort(401);
        }
        $export = Export::create($request->all());

        return redirect()->route('exports.index');
    }


    /**
     * Show the form for editing Export.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('export_edit')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::get()->pluck('name', 'id')->prepend('Please select', ''),
            'vocabularies' => \App\Vocabulary::get()->pluck('label', 'id')->prepend('Please select', ''),
            'elementsets' => \App\Elementset::get()->pluck('label', 'id')->prepend('Please select', ''),
            'profiles' => \App\Profile::get()->pluck('label', 'id')->prepend('Please select', ''),
        ];

        $export = Export::findOrFail($id);

        return view('exports.edit', compact('export') + $relations);
    }

    /**
     * Update Export in storage.
     *
     * @param  \App\Http\Requests\UpdateExportsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExportsRequest $request, $id)
    {
        if (! Gate::allows('export_edit')) {
            return abort(401);
        }
        $export = Export::findOrFail($id);
        $export->update($request->all());

        return redirect()->route('exports.index');
    }


    /**
     * Display Export.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('export_view')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::get()->pluck('name', 'id')->prepend('Please select', ''),
            'vocabularies' => \App\Vocabulary::get()->pluck('label', 'id')->prepend('Please select', ''),
            'elementsets' => \App\Elementset::get()->pluck('label', 'id')->prepend('Please select', ''),
            'profiles' => \App\Profile::get()->pluck('label', 'id')->prepend('Please select', ''),
        ];

        $export = Export::findOrFail($id);

        return view('exports.show', compact('export') + $relations);
    }


    /**
     * Remove Export from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('export_delete')) {
            return abort(401);
        }
        $export = Export::findOrFail($id);
        $export->delete();

        return redirect()->route('exports.index');
    }

    /**
     * Delete all selected Export at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('export_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Export::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
