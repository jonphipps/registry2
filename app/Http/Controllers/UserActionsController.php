<?php

namespace App\Http\Controllers;

use App\UserAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreUserActionsRequest;
use App\Http\Requests\UpdateUserActionsRequest;
use Yajra\Datatables\Datatables;

class UserActionsController extends Controller
{
    /**
     * Display a listing of UserAction.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('user_action_access')) {
            return abort(401);
        }
        
        if (request()->ajax()) {
            $query = UserAction::query();
            $query->with("user");
            $table = Datatables::of($query);
            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) {
                $gateKey  = 'user_action_';
                $routeKey = 'user_actions';

                return view('actionsTemplate', compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('action_model', function ($row) {
                return $row->action_model ? $row->action_model : '';
            });
            $table->editColumn('action_id', function ($row) {
                return $row->action_id ? $row->action_id : '';
            });

            return $table->make(true);
        }

        return view('user_actions.index');
    }

    /**
     * Display UserAction.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('user_action_view')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::get()->pluck('name', 'id')->prepend('Please select', ''),
        ];

        $user_action = UserAction::findOrFail($id);

        return view('user_actions.show', compact('user_action') + $relations);
    }

}
