@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.project.title')</h3>
    @can('project_create')
    <p>
        <a href="{{ route('projects.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped ajaxTable @can('project_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('project_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.project.fields.label')</th>
                        <th>@lang('quickadmin.project.fields.is-private')</th>
                        <th>@lang('quickadmin.project.fields.description')</th>
                        <th>@lang('quickadmin.project.fields.members')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('project_delete')
            window.route_mass_crud_entries_destroy = '{{ route('projects.mass_destroy') }}';
        @endcan
$(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('projects.index') !!}';
            window.dtDefaultOptions.columns = [
                @can('project_delete')
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endcan
                {data: 'label', name: 'label'},
                {data: 'is_private', name: 'is_private'},
                {data: 'description', name: 'description'},
                {data: 'members.name', name: 'members.name'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection