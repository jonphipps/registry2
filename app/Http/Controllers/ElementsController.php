<?php

namespace App\Http\Controllers;

use App\Element;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreElementsRequest;
use App\Http\Requests\UpdateElementsRequest;
use Yajra\Datatables\Datatables;

class ElementsController extends Controller
{
    /**
     * Display a listing of Element.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('element_access')) {
            return abort(401);
        }
        
        if (request()->ajax()) {
            $query = Element::query();
            $table = Datatables::of($query);
            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) {
                $gateKey  = 'element_';
                $routeKey = 'elements';

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
            $table->editColumn('json', function ($row) {
                return $row->json ? $row->json : '';
            });

            return $table->make(true);
        }

        return view('elements.index');
    }

    /**
     * Show the form for creating new Element.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('element_create')) {
            return abort(401);
        }
        return view('elements.create');
    }

    /**
     * Store a newly created Element in storage.
     *
     * @param  \App\Http\Requests\StoreElementsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreElementsRequest $request)
    {
        if (! Gate::allows('element_create')) {
            return abort(401);
        }
        $element = Element::create($request->all());

        return redirect()->route('elements.index');
    }


    /**
     * Show the form for editing Element.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('element_edit')) {
            return abort(401);
        }
        $element = Element::findOrFail($id);

        return view('elements.edit', compact('element'));
    }

    /**
     * Update Element in storage.
     *
     * @param  \App\Http\Requests\UpdateElementsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateElementsRequest $request, $id)
    {
        if (! Gate::allows('element_edit')) {
            return abort(401);
        }
        $element = Element::findOrFail($id);
        $element->update($request->all());

        return redirect()->route('elements.index');
    }


    /**
     * Display Element.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('element_view')) {
            return abort(401);
        }
        $relations = [
            'translations' => \App\Translation::where('element_id', $id)->get(),
            'statements' => \App\Statement::where('element_id', $id)->get(),
        ];

        $element = Element::findOrFail($id);

        return view('elements.show', compact('element') + $relations);
    }


    /**
     * Remove Element from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('element_delete')) {
            return abort(401);
        }
        $element = Element::findOrFail($id);
        $element->delete();

        return redirect()->route('elements.index');
    }

    /**
     * Delete all selected Element at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('element_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Element::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
