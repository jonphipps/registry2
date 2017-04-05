<?php

namespace App\Http\Controllers;

use App\Re;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreResRequest;
use App\Http\Requests\UpdateResRequest;
use Yajra\Datatables\Datatables;

class ResController extends Controller
{
    /**
     * Display a listing of Re.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('re_access')) {
            return abort(401);
        }
        
        if (request()->ajax()) {
            $query = Re::query();
            $query->with("members");
            $query->with("project");
            $query->with("profile");
            $table = Datatables::of($query);
            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) {
                $gateKey  = 're_';
                $routeKey = 'res';

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
            $table->editColumn('profile.label', function ($row) {
                return $row->profile ? $row->profile->label : '';
            });
            $table->editColumn('json', function ($row) {
                return $row->json ? $row->json : '';
            });

            return $table->make(true);
        }

        return view('res.index');
    }

    /**
     * Show the form for creating new Re.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('re_create')) {
            return abort(401);
        }
        $relations = [
            'members' => \App\User::get()->pluck('name', 'id'),
            'projects' => \App\Project::get()->pluck('label', 'id')->prepend('Please select', ''),
            'profiles' => \App\Profile::get()->pluck('label', 'id')->prepend('Please select', ''),
        ];

        return view('res.create', $relations);
    }

    /**
     * Store a newly created Re in storage.
     *
     * @param  \App\Http\Requests\StoreResRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResRequest $request)
    {
        if (! Gate::allows('re_create')) {
            return abort(401);
        }
        $re = Re::create($request->all());
        $re->members()->sync(array_filter((array)$request->input('members')));

        return redirect()->route('res.index');
    }


    /**
     * Show the form for editing Re.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('re_edit')) {
            return abort(401);
        }
        $relations = [
            'members' => \App\User::get()->pluck('name', 'id'),
            'projects' => \App\Project::get()->pluck('label', 'id')->prepend('Please select', ''),
            'profiles' => \App\Profile::get()->pluck('label', 'id')->prepend('Please select', ''),
        ];

        $re = Re::findOrFail($id);

        return view('res.edit', compact('re') + $relations);
    }

    /**
     * Update Re in storage.
     *
     * @param  \App\Http\Requests\UpdateResRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResRequest $request, $id)
    {
        if (! Gate::allows('re_edit')) {
            return abort(401);
        }
        $re = Re::findOrFail($id);
        $re->update($request->all());
        $re->members()->sync(array_filter((array)$request->input('members')));

        return redirect()->route('res.index');
    }


    /**
     * Display Re.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('re_view')) {
            return abort(401);
        }
        $relations = [
            'members' => \App\User::get()->pluck('name', 'id'),
            'projects' => \App\Project::get()->pluck('label', 'id')->prepend('Please select', ''),
            'profiles' => \App\Profile::get()->pluck('label', 'id')->prepend('Please select', ''),
            'translations' => \App\Translation::where('res_id', $id)->get(),
            'statements' => \App\Statement::where('res_id', $id)->get(),
        ];

        $re = Re::findOrFail($id);

        return view('res.show', compact('re') + $relations);
    }


    /**
     * Remove Re from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('re_delete')) {
            return abort(401);
        }
        $re = Re::findOrFail($id);
        $re->delete();

        return redirect()->route('res.index');
    }

    /**
     * Delete all selected Re at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('re_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Re::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
