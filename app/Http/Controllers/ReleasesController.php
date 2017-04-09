<?php

namespace App\Http\Controllers;

use App\Release;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreReleasesRequest;
use App\Http\Requests\UpdateReleasesRequest;
use Yajra\Datatables\Datatables;

class ReleasesController extends Controller
{
    /**
     * Display a listing of Release.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('release_access')) {
            return abort(401);
        }
        
        if (request()->ajax()) {
            $query = Release::query();
            $query->with("project");
            $table = Datatables::of($query);
            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) {
                $gateKey  = 'release_';
                $routeKey = 'releases';

                return view('actionsTemplate', compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('sha', function ($row) {
                return $row->sha ? $row->sha : '';
            });
            $table->editColumn('tag', function ($row) {
                return $row->tag ? $row->tag : '';
            });
            $table->editColumn('notes', function ($row) {
                return $row->notes ? $row->notes : '';
            });
            $table->editColumn('project.label', function ($row) {
                return $row->project ? $row->project->label : '';
            });

            return $table->make(true);
        }

        return view('releases.index');
    }

    /**
     * Show the form for creating new Release.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('release_create')) {
            return abort(401);
        }
        $relations = [
            'projects' => \App\Project::get()->pluck('label', 'id')->prepend('Please select', ''),
        ];

        return view('releases.create', $relations);
    }

    /**
     * Store a newly created Release in storage.
     *
     * @param  \App\Http\Requests\StoreReleasesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReleasesRequest $request)
    {
        if (! Gate::allows('release_create')) {
            return abort(401);
        }
        $release = Release::create($request->all());

        return redirect()->route('releases.index');
    }


    /**
     * Show the form for editing Release.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('release_edit')) {
            return abort(401);
        }
        $relations = [
            'projects' => \App\Project::get()->pluck('label', 'id')->prepend('Please select', ''),
        ];

        $release = Release::findOrFail($id);

        return view('releases.edit', compact('release') + $relations);
    }

    /**
     * Update Release in storage.
     *
     * @param  \App\Http\Requests\UpdateReleasesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReleasesRequest $request, $id)
    {
        if (! Gate::allows('release_edit')) {
            return abort(401);
        }
        $release = Release::findOrFail($id);
        $release->update($request->all());

        return redirect()->route('releases.index');
    }


    /**
     * Display Release.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('release_view')) {
            return abort(401);
        }
        $relations = [
            'projects' => \App\Project::get()->pluck('label', 'id')->prepend('Please select', ''),
        ];

        $release = Release::findOrFail($id);

        return view('releases.show', compact('release') + $relations);
    }


    /**
     * Remove Release from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('release_delete')) {
            return abort(401);
        }
        $release = Release::findOrFail($id);
        $release->delete();

        return redirect()->route('releases.index');
    }

    /**
     * Delete all selected Release at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('release_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Release::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
