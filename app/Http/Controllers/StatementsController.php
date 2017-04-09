<?php

namespace App\Http\Controllers;

use App\Statement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreStatementsRequest;
use App\Http\Requests\UpdateStatementsRequest;
use Yajra\Datatables\Datatables;

class StatementsController extends Controller
{
    /**
     * Display a listing of Statement.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('statement_access')) {
            return abort(401);
        }
        
        if (request()->ajax()) {
            $query = Statement::query();
            $query->with("translation");
            $query->with("elementset");
            $query->with("vocabulary");
            $query->with("project");
            $query->with("property");
            $query->with("concept");
            $query->with("element");
            $table = Datatables::of($query);
            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) {
                $gateKey  = 'statement_';
                $routeKey = 'statements';

                return view('actionsTemplate', compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('value', function ($row) {
                return $row->value ? $row->value : '';
            });
            $table->editColumn('elementset.label', function ($row) {
                return $row->elementset ? $row->elementset->label : '';
            });
            $table->editColumn('vocabulary.label', function ($row) {
                return $row->vocabulary ? $row->vocabulary->label : '';
            });
            $table->editColumn('project.label', function ($row) {
                return $row->project ? $row->project->label : '';
            });
            $table->editColumn('property.label', function ($row) {
                return $row->property ? $row->property->label : '';
            });
            $table->editColumn('concept.label', function ($row) {
                return $row->concept ? $row->concept->label : '';
            });
            $table->editColumn('element.label', function ($row) {
                return $row->element ? $row->element->label : '';
            });

            return $table->make(true);
        }

        return view('statements.index');
    }

    /**
     * Show the form for creating new Statement.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('statement_create')) {
            return abort(401);
        }
        $relations = [
            'translations' => \App\Translation::get()->pluck('version', 'id')->prepend('Please select', ''),
            'elementsets' => \App\Elementset::get()->pluck('label', 'id')->prepend('Please select', ''),
            'vocabularies' => \App\Vocabulary::get()->pluck('label', 'id')->prepend('Please select', ''),
            'projects' => \App\Project::get()->pluck('label', 'id')->prepend('Please select', ''),
            'properties' => \App\Property::get()->pluck('label', 'id')->prepend('Please select', ''),
            'concepts' => \App\Concept::get()->pluck('label', 'id')->prepend('Please select', ''),
            'elements' => \App\Element::get()->pluck('label', 'id')->prepend('Please select', ''),
        ];

        return view('statements.create', $relations);
    }

    /**
     * Store a newly created Statement in storage.
     *
     * @param  \App\Http\Requests\StoreStatementsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStatementsRequest $request)
    {
        if (! Gate::allows('statement_create')) {
            return abort(401);
        }
        $statement = Statement::create($request->all());

        return redirect()->route('statements.index');
    }


    /**
     * Show the form for editing Statement.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('statement_edit')) {
            return abort(401);
        }
        $relations = [
            'translations' => \App\Translation::get()->pluck('version', 'id')->prepend('Please select', ''),
            'elementsets' => \App\Elementset::get()->pluck('label', 'id')->prepend('Please select', ''),
            'vocabularies' => \App\Vocabulary::get()->pluck('label', 'id')->prepend('Please select', ''),
            'projects' => \App\Project::get()->pluck('label', 'id')->prepend('Please select', ''),
            'properties' => \App\Property::get()->pluck('label', 'id')->prepend('Please select', ''),
            'concepts' => \App\Concept::get()->pluck('label', 'id')->prepend('Please select', ''),
            'elements' => \App\Element::get()->pluck('label', 'id')->prepend('Please select', ''),
        ];

        $statement = Statement::findOrFail($id);

        return view('statements.edit', compact('statement') + $relations);
    }

    /**
     * Update Statement in storage.
     *
     * @param  \App\Http\Requests\UpdateStatementsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStatementsRequest $request, $id)
    {
        if (! Gate::allows('statement_edit')) {
            return abort(401);
        }
        $statement = Statement::findOrFail($id);
        $statement->update($request->all());

        return redirect()->route('statements.index');
    }


    /**
     * Display Statement.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('statement_view')) {
            return abort(401);
        }
        $relations = [
            'translations' => \App\Translation::get()->pluck('version', 'id')->prepend('Please select', ''),
            'elementsets' => \App\Elementset::get()->pluck('label', 'id')->prepend('Please select', ''),
            'vocabularies' => \App\Vocabulary::get()->pluck('label', 'id')->prepend('Please select', ''),
            'projects' => \App\Project::get()->pluck('label', 'id')->prepend('Please select', ''),
            'properties' => \App\Property::get()->pluck('label', 'id')->prepend('Please select', ''),
            'concepts' => \App\Concept::get()->pluck('label', 'id')->prepend('Please select', ''),
            'elements' => \App\Element::get()->pluck('label', 'id')->prepend('Please select', ''),
        ];

        $statement = Statement::findOrFail($id);

        return view('statements.show', compact('statement') + $relations);
    }


    /**
     * Remove Statement from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('statement_delete')) {
            return abort(401);
        }
        $statement = Statement::findOrFail($id);
        $statement->delete();

        return redirect()->route('statements.index');
    }

    /**
     * Delete all selected Statement at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('statement_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Statement::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
