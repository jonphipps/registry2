<?php

namespace App\Http\Controllers;

use App\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreLanguagesRequest;
use App\Http\Requests\UpdateLanguagesRequest;
use Yajra\Datatables\Datatables;

class LanguagesController extends Controller
{
    /**
     * Display a listing of Language.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('language_access')) {
            return abort(401);
        }
        
        if (request()->ajax()) {
            $query = Language::query();
            $table = Datatables::of($query);
            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) {
                $gateKey  = 'language_';
                $routeKey = 'languages';

                return view('actionsTemplate', compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('code', function ($row) {
                return $row->code ? $row->code : '';
            });
            $table->editColumn('label', function ($row) {
                return $row->label ? $row->label : '';
            });

            return $table->make(true);
        }

        return view('languages.index');
    }

    /**
     * Show the form for creating new Language.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('language_create')) {
            return abort(401);
        }
        return view('languages.create');
    }

    /**
     * Store a newly created Language in storage.
     *
     * @param  \App\Http\Requests\StoreLanguagesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLanguagesRequest $request)
    {
        if (! Gate::allows('language_create')) {
            return abort(401);
        }
        $language = Language::create($request->all());

        return redirect()->route('languages.index');
    }


    /**
     * Show the form for editing Language.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('language_edit')) {
            return abort(401);
        }
        $language = Language::findOrFail($id);

        return view('languages.edit', compact('language'));
    }

    /**
     * Update Language in storage.
     *
     * @param  \App\Http\Requests\UpdateLanguagesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLanguagesRequest $request, $id)
    {
        if (! Gate::allows('language_edit')) {
            return abort(401);
        }
        $language = Language::findOrFail($id);
        $language->update($request->all());

        return redirect()->route('languages.index');
    }


    /**
     * Display Language.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('language_view')) {
            return abort(401);
        }
        $language = Language::findOrFail($id);

        return view('languages.show', compact('language'));
    }


    /**
     * Remove Language from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('language_delete')) {
            return abort(401);
        }
        $language = Language::findOrFail($id);
        $language->delete();

        return redirect()->route('languages.index');
    }

    /**
     * Delete all selected Language at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('language_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Language::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
