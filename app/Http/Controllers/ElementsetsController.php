<?php

namespace App\Http\Controllers;

use App\Elementset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreElementsetsRequest;
use App\Http\Requests\UpdateElementsetsRequest;
use Yajra\Datatables\Datatables;

class ElementsetsController extends Controller
{
    /**
     * Display a listing of Elementset.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('elementset_access')) {
            return abort(401);
        }
        
        if (request()->ajax()) {
            $query = Elementset::query();
            $query->with("members");
            $query->with("project");
            $table = Datatables::of($query);
            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) {
                $gateKey  = 'elementset_';
                $routeKey = 'elementsets';

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
            $table->editColumn('uri', function ($row) {
                return $row->uri ? $row->uri : '';
            });
            $table->editColumn('members.name', function ($row) {
                if(count($row->members) == 0) {
                    return '';
                }
                
                return '<span class="label label-info label-many">' . implode('</span><span class="label label-info label-many"> ',
                        $row->members->pluck('name')->toArray()) . '</span>';
            });
            $table->editColumn('project.label', function ($row) {
                return $row->project ? $row->project->label : '';
            });
            $table->editColumn('json', function ($row) {
                return $row->json ? $row->json : '';
            });

            return $table->make(true);
        }

        return view('elementsets.index');
    }

    /**
     * Show the form for creating new Elementset.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('elementset_create')) {
            return abort(401);
        }
        $relations = [
            'members' => \App\User::get()->pluck('name', 'id'),
            'projects' => \App\Project::get()->pluck('label', 'id')->prepend('Please select', ''),
        ];

        return view('elementsets.create', $relations);
    }

    /**
     * Store a newly created Elementset in storage.
     *
     * @param  \App\Http\Requests\StoreElementsetsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreElementsetsRequest $request)
    {
        if (! Gate::allows('elementset_create')) {
            return abort(401);
        }
        $elementset = Elementset::create($request->all());
        $elementset->members()->sync(array_filter((array)$request->input('members')));

        return redirect()->route('elementsets.index');
    }


    /**
     * Show the form for editing Elementset.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('elementset_edit')) {
            return abort(401);
        }
        $relations = [
            'members' => \App\User::get()->pluck('name', 'id'),
            'projects' => \App\Project::get()->pluck('label', 'id')->prepend('Please select', ''),
        ];

        $elementset = Elementset::findOrFail($id);

        return view('elementsets.edit', compact('elementset') + $relations);
    }

    /**
     * Update Elementset in storage.
     *
     * @param  \App\Http\Requests\UpdateElementsetsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateElementsetsRequest $request, $id)
    {
        if (! Gate::allows('elementset_edit')) {
            return abort(401);
        }
        $elementset = Elementset::findOrFail($id);
        $elementset->update($request->all());
        $elementset->members()->sync(array_filter((array)$request->input('members')));

        return redirect()->route('elementsets.index');
    }


    /**
     * Display Elementset.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('elementset_view')) {
            return abort(401);
        }
        $relations = [
            'members' => \App\User::get()->pluck('name', 'id'),
            'projects' => \App\Project::get()->pluck('label', 'id')->prepend('Please select', ''),
            'translations' => \App\Translation::where('elementset_id', $id)->get(),
            'statements' => \App\Statement::where('elementset_id', $id)->get(),
            'exports' => \App\Export::where('elementset_id', $id)->get(),
            'imports' => \App\Import::where('elementset_id', $id)->get(),
        ];

        $elementset = Elementset::findOrFail($id);

        return view('elementsets.show', compact('elementset') + $relations);
    }


    /**
     * Remove Elementset from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('elementset_delete')) {
            return abort(401);
        }
        $elementset = Elementset::findOrFail($id);
        $elementset->delete();

        return redirect()->route('elementsets.index');
    }

    /**
     * Delete all selected Elementset at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('elementset_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Elementset::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
