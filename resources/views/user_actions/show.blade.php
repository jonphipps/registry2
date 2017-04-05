@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.user-actions.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.user-actions.fields.user')</th>
                            <td>{{ $user_action->user->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.user-actions.fields.action')</th>
                            <td>{{ $user_action->action }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.user-actions.fields.action-model')</th>
                            <td>{{ $user_action->action_model }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.user-actions.fields.action-id')</th>
                            <td>{{ $user_action->action_id }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('user_actions.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop