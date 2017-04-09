<?php

namespace App\Http\Controllers;

use App\Vocabulary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreVocabulariesRequest;
use App\Http\Requests\UpdateVocabulariesRequest;
use Yajra\Datatables\Datatables;

class VocabulariesController extends Controller
{
    /**
     * Display a listing of Vocabulary.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('vocabulary_access')) {
            return abort(401);
        }
        
        if (request()->ajax()) {
            $query = Vocabulary::query();
            $query->with("members");
            $query->with("project");
            $table = Datatables::of($query);
            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) {
                $gateKey  = 'vocabulary_';
                $routeKey = 'vocabularies';

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

        return view('vocabularies.index');
    }

    /**
     * Show the form for creating new Vocabulary.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('vocabulary_create')) {
            return abort(401);
        }
        $relations = [
            'members' => \App\User::get()->pluck('name', 'id'),
            'projects' => \App\Project::get()->pluck('label', 'id')->prepend('Please select', ''),
        ];

        return view('vocabularies.create', $relations);
    }

    /**
     * Store a newly created Vocabulary in storage.
     *
     * @param  \App\Http\Requests\StoreVocabulariesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVocabulariesRequest $request)
    {
        if (! Gate::allows('vocabulary_create')) {
            return abort(401);
        }
        $vocabulary = Vocabulary::create($request->all());
        $vocabulary->members()->sync(array_filter((array)$request->input('members')));

        return redirect()->route('vocabularies.index');
    }


    /**
     * Show the form for editing Vocabulary.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('vocabulary_edit')) {
            return abort(401);
        }
        $relations = [
            'members' => \App\User::get()->pluck('name', 'id'),
            'projects' => \App\Project::get()->pluck('label', 'id')->prepend('Please select', ''),
        ];

        $vocabulary = Vocabulary::findOrFail($id);

        return view('vocabularies.edit', compact('vocabulary') + $relations);
    }

    /**
     * Update Vocabulary in storage.
     *
     * @param  \App\Http\Requests\UpdateVocabulariesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVocabulariesRequest $request, $id)
    {
        if (! Gate::allows('vocabulary_edit')) {
            return abort(401);
        }
        $vocabulary = Vocabulary::findOrFail($id);
        $vocabulary->update($request->all());
        $vocabulary->members()->sync(array_filter((array)$request->input('members')));

        return redirect()->route('vocabularies.index');
    }


    /**
     * Display Vocabulary.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('vocabulary_view')) {
            return abort(401);
        }
        $relations = [
            'members' => \App\User::get()->pluck('name', 'id'),
            'projects' => \App\Project::get()->pluck('label', 'id')->prepend('Please select', ''),
            'exports' => \App\Export::where('vocabulary_id', $id)->get(),
            'translations' => \App\Translation::where('vocabulary_id', $id)->get(),
            'imports' => \App\Import::where('vocabulary_id', $id)->get(),
            'statements' => \App\Statement::where('vocabulary_id', $id)->get(),
        ];

        $vocabulary = Vocabulary::findOrFail($id);

        return view('vocabularies.show', compact('vocabulary') + $relations);
    }


    /**
     * Remove Vocabulary from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('vocabulary_delete')) {
            return abort(401);
        }
        $vocabulary = Vocabulary::findOrFail($id);
        $vocabulary->delete();

        return redirect()->route('vocabularies.index');
    }

    /**
     * Delete all selected Vocabulary at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('vocabulary_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Vocabulary::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
