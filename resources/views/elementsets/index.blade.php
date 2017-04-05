@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.elementset.title')</h3>
    @can('elementset_create')
    <p>
        <a href="{{ route('elementsets.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped ajaxTable @can('elementset_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('elementset_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.elementset.fields.label')</th>
                        <th>@lang('quickadmin.elementset.fields.description')</th>
                        <th>@lang('quickadmin.elementset.fields.uri')</th>
                        <th>@lang('quickadmin.elementset.fields.project')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('elementset_delete')
            window.route_mass_crud_entries_destroy = '{{ route('elementsets.mass_destroy') }}';
        @endcan
$(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('elementsets.index') !!}';
            window.dtDefaultOptions.columns = [
                @can('elementset_delete')
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endcan
                {data: 'label', name: 'label'},
                {data: 'description', name: 'description'},
                {data: 'uri', name: 'uri'},
                {data: 'project.label', name: 'project.label'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection