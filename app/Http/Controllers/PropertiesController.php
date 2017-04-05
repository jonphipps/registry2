<?php

namespace App\Http\Controllers;

use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StorePropertiesRequest;
use App\Http\Requests\UpdatePropertiesRequest;
use Yajra\Datatables\Datatables;

class PropertiesController extends Controller
{
    /**
     * Display a listing of Property.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('property_access')) {
            return abort(401);
        }
        
        if (request()->ajax()) {
            $query = Property::query();
            $query->with("profile");
            $table = Datatables::of($query);
            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) {
                $gateKey  = 'property_';
                $routeKey = 'properties';

                return view('actionsTemplate', compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('profile.label', function ($row) {
                return $row->profile ? $row->profile->label : '';
            });
            $table->editColumn('in_list', function ($row) {
                return \Form::checkbox("in_list", 1, $row->in_list == 1, ["disabled"]);
            });
            $table->editColumn('in_show', function ($row) {
                return \Form::checkbox("in_show", 1, $row->in_show == 1, ["disabled"]);
            });
            $table->editColumn('in_edit', function ($row) {
                return \Form::checkbox("in_edit", 1, $row->in_edit == 1, ["disabled"]);
            });
            $table->editColumn('in_create', function ($row) {
                return \Form::checkbox("in_create", 1, $row->in_create == 1, ["disabled"]);
            });
            $table->editColumn('in_rdf', function ($row) {
                return \Form::checkbox("in_rdf", 1, $row->in_rdf == 1, ["disabled"]);
            });
            $table->editColumn('in_xml', function ($row) {
                return \Form::checkbox("in_xml", 1, $row->in_xml == 1, ["disabled"]);
            });
            $table->editColumn('symmetric_uri', function ($row) {
                return $row->symmetric_uri ? $row->symmetric_uri : '';
            });

            return $table->make(true);
        }

        return view('properties.index');
    }

    /**
     * Show the form for creating new Property.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('property_create')) {
            return abort(401);
        }
        $relations = [
            'profiles' => \App\Profile::get()->pluck('label', 'id')->prepend('Please select', ''),
        ];

        return view('properties.create', $relations);
    }

    /**
     * Store a newly created Property in storage.
     *
     * @param  \App\Http\Requests\StorePropertiesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePropertiesRequest $request)
    {
        if (! Gate::allows('property_create')) {
            return abort(401);
        }
        $property = Property::create($request->all());

        return redirect()->route('properties.index');
    }


    /**
     * Show the form for editing Property.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('property_edit')) {
            return abort(401);
        }
        $relations = [
            'profiles' => \App\Profile::get()->pluck('label', 'id')->prepend('Please select', ''),
        ];

        $property = Property::findOrFail($id);

        return view('properties.edit', compact('property') + $relations);
    }

    /**
     * Update Property in storage.
     *
     * @param  \App\Http\Requests\UpdatePropertiesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePropertiesRequest $request, $id)
    {
        if (! Gate::allows('property_edit')) {
            return abort(401);
        }
        $property = Property::findOrFail($id);
        $property->update($request->all());

        return redirect()->route('properties.index');
    }


    /**
     * Display Property.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('property_view')) {
            return abort(401);
        }
        $relations = [
            'profiles' => \App\Profile::get()->pluck('label', 'id')->prepend('Please select', ''),
        ];

        $property = Property::findOrFail($id);

        return view('properties.show', compact('property') + $relations);
    }


    /**
     * Remove Property from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('property_delete')) {
            return abort(401);
        }
        $property = Property::findOrFail($id);
        $property->delete();

        return redirect()->route('properties.index');
    }

    /**
     * Delete all selected Property at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('property_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Property::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
