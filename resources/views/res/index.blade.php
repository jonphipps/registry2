@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.res.title')</h3>
    @can('re_create')
    <p>
        <a href="{{ route('res.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped ajaxTable @can('re_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('re_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.res.fields.label')</th>
                        <th>@lang('quickadmin.res.fields.description')</th>
                        <th>@lang('quickadmin.res.fields.uri')</th>
                        <th>@lang('quickadmin.res.fields.project')</th>
                        <th>@lang('quickadmin.res.fields.profile')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('re_delete')
            window.route_mass_crud_entries_destroy = '{{ route('res.mass_destroy') }}';
        @endcan
$(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('res.index') !!}';
            window.dtDefaultOptions.columns = [
                @can('re_delete')
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endcan
                {data: 'label', name: 'label'},
                {data: 'description', name: 'description'},
                {data: 'uri', name: 'uri'},
                {data: 'project.label', name: 'project.label'},
                {data: 'profile.label', name: 'profile.label'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection