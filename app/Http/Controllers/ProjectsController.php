<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreProjectsRequest;
use App\Http\Requests\UpdateProjectsRequest;
use Yajra\Datatables\Datatables;

class ProjectsController extends Controller
{
    /**
     * Display a listing of Project.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('project_access')) {
            return abort(401);
        }
        
        if (request()->ajax()) {
            $query = Project::query();
            $query->with("members");
            $table = Datatables::of($query);
            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) {
                $gateKey  = 'project_';
                $routeKey = 'projects';

                return view('actionsTemplate', compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('label', function ($row) {
                return $row->label ? $row->label : '';
            });
            $table->editColumn('repo', function ($row) {
                return $row->repo ? $row->repo : '';
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

            return $table->make(true);
        }

        return view('projects.index');
    }

    /**
     * Show the form for creating new Project.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('project_create')) {
            return abort(401);
        }
        $relations = [
            'members' => \App\User::get()->pluck('name', 'id'),
        ];

        return view('projects.create', $relations);
    }

    /**
     * Store a newly created Project in storage.
     *
     * @param  \App\Http\Requests\StoreProjectsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectsRequest $request)
    {
        if (! Gate::allows('project_create')) {
            return abort(401);
        }
        $project = Project::create($request->all());
        $project->members()->sync(array_filter((array)$request->input('members')));

        return redirect()->route('projects.index');
    }


    /**
     * Show the form for editing Project.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('project_edit')) {
            return abort(401);
        }
        $relations = [
            'members' => \App\User::get()->pluck('name', 'id'),
        ];

        $project = Project::findOrFail($id);

        return view('projects.edit', compact('project') + $relations);
    }

    /**
     * Update Project in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectsRequest $request, $id)
    {
        if (! Gate::allows('project_edit')) {
            return abort(401);
        }
        $project = Project::findOrFail($id);
        $project->update($request->all());
        $project->members()->sync(array_filter((array)$request->input('members')));

        return redirect()->route('projects.index');
    }


    /**
     * Display Project.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('project_view')) {
            return abort(401);
        }
        $relations = [
            'members' => \App\User::get()->pluck('name', 'id'),
            'elementsets' => \App\Elementset::where('project_id', $id)->get(),
            'res' => \App\Re::where('project_id', $id)->get(),
            'vocabularies' => \App\Vocabulary::where('project_id', $id)->get(),
        ];

        $project = Project::findOrFail($id);

        return view('projects.show', compact('project') + $relations);
    }


    /**
     * Remove Project from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('project_delete')) {
            return abort(401);
        }
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('projects.index');
    }

    /**
     * Delete all selected Project at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('project_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Project::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
