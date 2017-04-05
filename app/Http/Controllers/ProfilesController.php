<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreProfilesRequest;
use App\Http\Requests\UpdateProfilesRequest;
use Yajra\Datatables\Datatables;

class ProfilesController extends Controller
{
    /**
     * Display a listing of Profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('profile_access')) {
            return abort(401);
        }
        
        if (request()->ajax()) {
            $query = Profile::query();
            $table = Datatables::of($query);
            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) {
                $gateKey  = 'profile_';
                $routeKey = 'profiles';

                return view('actionsTemplate', compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('label', function ($row) {
                return $row->label ? $row->label : '';
            });

            return $table->make(true);
        }

        return view('profiles.index');
    }

    /**
     * Show the form for creating new Profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('profile_create')) {
            return abort(401);
        }
        return view('profiles.create');
    }

    /**
     * Store a newly created Profile in storage.
     *
     * @param  \App\Http\Requests\StoreProfilesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfilesRequest $request)
    {
        if (! Gate::allows('profile_create')) {
            return abort(401);
        }
        $profile = Profile::create($request->all());

        return redirect()->route('profiles.index');
    }


    /**
     * Show the form for editing Profile.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('profile_edit')) {
            return abort(401);
        }
        $profile = Profile::findOrFail($id);

        return view('profiles.edit', compact('profile'));
    }

    /**
     * Update Profile in storage.
     *
     * @param  \App\Http\Requests\UpdateProfilesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfilesRequest $request, $id)
    {
        if (! Gate::allows('profile_edit')) {
            return abort(401);
        }
        $profile = Profile::findOrFail($id);
        $profile->update($request->all());

        return redirect()->route('profiles.index');
    }


    /**
     * Display Profile.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('profile_view')) {
            return abort(401);
        }
        $relations = [
            'properties' => \App\Property::where('profile_id', $id)->get(),
            'res' => \App\Re::where('profile_id', $id)->get(),
        ];

        $profile = Profile::findOrFail($id);

        return view('profiles.show', compact('profile') + $relations);
    }


    /**
     * Remove Profile from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('profile_delete')) {
            return abort(401);
        }
        $profile = Profile::findOrFail($id);
        $profile->delete();

        return redirect()->route('profiles.index');
    }

    /**
     * Delete all selected Profile at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('profile_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Profile::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
