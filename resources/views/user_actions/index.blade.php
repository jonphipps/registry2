@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.user-actions.title')</h3>
    @can('user_action_create')
    <p>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped ajaxTable ">
                <thead>
                    <tr>
                        
                        <th>@lang('quickadmin.user-actions.created_at')</th>
                        <th>@lang('quickadmin.user-actions.fields.user')</th>
                        <th>@lang('quickadmin.user-actions.fields.action')</th>
                        <th>@lang('quickadmin.user-actions.fields.action-model')</th>
                        <th>@lang('quickadmin.user-actions.fields.action-id')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('user_actions.index') !!}';
            window.dtDefaultOptions.columns = [
                @can('user_action_delete')
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endcan
                {data: 'user.name', name: 'user.name'},
                {data: 'action', name: 'action'},
                {data: 'action_model', name: 'action_model'},
                {data: 'action_id', name: 'action_id'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection