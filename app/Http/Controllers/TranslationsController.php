<?php

namespace App\Http\Controllers;

use App\Translation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreTranslationsRequest;
use App\Http\Requests\UpdateTranslationsRequest;
use Yajra\Datatables\Datatables;

class TranslationsController extends Controller
{
    /**
     * Display a listing of Translation.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('translation_access')) {
            return abort(401);
        }
        
        if (request()->ajax()) {
            $query = Translation::query();
            $query->with("res");
            $table = Datatables::of($query);
            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) {
                $gateKey  = 'translation_';
                $routeKey = 'translations';

                return view('actionsTemplate', compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('res.label', function ($row) {
                return $row->res ? $row->res->label : '';
            });

            return $table->make(true);
        }

        return view('translations.index');
    }

    /**
     * Show the form for creating new Translation.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('translation_create')) {
            return abort(401);
        }
        $relations = [
            'res' => \App\Re::get()->pluck('label', 'id')->prepend('Please select', ''),
        ];

        return view('translations.create', $relations);
    }

    /**
     * Store a newly created Translation in storage.
     *
     * @param  \App\Http\Requests\StoreTranslationsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTranslationsRequest $request)
    {
        if (! Gate::allows('translation_create')) {
            return abort(401);
        }
        $translation = Translation::create($request->all());

        return redirect()->route('translations.index');
    }


    /**
     * Show the form for editing Translation.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('translation_edit')) {
            return abort(401);
        }
        $relations = [
            'res' => \App\Re::get()->pluck('label', 'id')->prepend('Please select', ''),
        ];

        $translation = Translation::findOrFail($id);

        return view('translations.edit', compact('translation') + $relations);
    }

    /**
     * Update Translation in storage.
     *
     * @param  \App\Http\Requests\UpdateTranslationsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTranslationsRequest $request, $id)
    {
        if (! Gate::allows('translation_edit')) {
            return abort(401);
        }
        $translation = Translation::findOrFail($id);
        $translation->update($request->all());

        return redirect()->route('translations.index');
    }


    /**
     * Display Translation.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('translation_view')) {
            return abort(401);
        }
        $relations = [
            'res' => \App\Re::get()->pluck('label', 'id')->prepend('Please select', ''),
            'statements' => \App\Statement::where('translation_id', $id)->get(),
        ];

        $translation = Translation::findOrFail($id);

        return view('translations.show', compact('translation') + $relations);
    }


    /**
     * Remove Translation from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('translation_delete')) {
            return abort(401);
        }
        $translation = Translation::findOrFail($id);
        $translation->delete();

        return redirect()->route('translations.index');
    }

    /**
     * Delete all selected Translation at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('translation_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Translation::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
