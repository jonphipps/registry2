<?php

namespace App\Http\Controllers;

use App\Concept;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreConceptsRequest;
use App\Http\Requests\UpdateConceptsRequest;
use Yajra\Datatables\Datatables;

class ConceptsController extends Controller
{
    /**
     * Display a listing of Concept.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('concept_access')) {
            return abort(401);
        }
        
        if (request()->ajax()) {
            $query = Concept::query();
            $table = Datatables::of($query);
            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) {
                $gateKey  = 'concept_';
                $routeKey = 'concepts';

                return view('actionsTemplate', compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('label', function ($row) {
                return $row->label ? $row->label : '';
            });
            $table->editColumn('uri', function ($row) {
                return $row->uri ? $row->uri : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });

            return $table->make(true);
        }

        return view('concepts.index');
    }

    /**
     * Show the form for creating new Concept.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('concept_create')) {
            return abort(401);
        }
        return view('concepts.create');
    }

    /**
     * Store a newly created Concept in storage.
     *
     * @param  \App\Http\Requests\StoreConceptsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConceptsRequest $request)
    {
        if (! Gate::allows('concept_create')) {
            return abort(401);
        }
        $concept = Concept::create($request->all());

        return redirect()->route('concepts.index');
    }


    /**
     * Show the form for editing Concept.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('concept_edit')) {
            return abort(401);
        }
        $concept = Concept::findOrFail($id);

        return view('concepts.edit', compact('concept'));
    }

    /**
     * Update Concept in storage.
     *
     * @param  \App\Http\Requests\UpdateConceptsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConceptsRequest $request, $id)
    {
        if (! Gate::allows('concept_edit')) {
            return abort(401);
        }
        $concept = Concept::findOrFail($id);
        $concept->update($request->all());

        return redirect()->route('concepts.index');
    }


    /**
     * Display Concept.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('concept_view')) {
            return abort(401);
        }
        $relations = [
            'translations' => \App\Translation::where('concept_id', $id)->get(),
            'statements' => \App\Statement::where('concept_id', $id)->get(),
        ];

        $concept = Concept::findOrFail($id);

        return view('concepts.show', compact('concept') + $relations);
    }


    /**
     * Remove Concept from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('concept_delete')) {
            return abort(401);
        }
        $concept = Concept::findOrFail($id);
        $concept->delete();

        return redirect()->route('concepts.index');
    }

    /**
     * Delete all selected Concept at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('concept_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Concept::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
