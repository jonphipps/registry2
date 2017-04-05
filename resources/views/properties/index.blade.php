@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.property.title')</h3>
    @can('property_create')
    <p>
        <a href="{{ route('properties.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped ajaxTable @can('property_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('property_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.property.fields.name')</th>
                        <th>@lang('quickadmin.property.fields.label')</th>
                        <th>@lang('quickadmin.property.fields.uri')</th>
                        <th>@lang('quickadmin.property.fields.profile')</th>
                        <th>@lang('quickadmin.property.fields.in-list')</th>
                        <th>@lang('quickadmin.property.fields.in-show')</th>
                        <th>@lang('quickadmin.property.fields.in-edit')</th>
                        <th>@lang('quickadmin.property.fields.in-create')</th>
                        <th>@lang('quickadmin.property.fields.in-rdf')</th>
                        <th>@lang('quickadmin.property.fields.in-xml')</th>
                        <th>@lang('quickadmin.property.fields.symmetric-uri')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('property_delete')
            window.route_mass_crud_entries_destroy = '{{ route('properties.mass_destroy') }}';
        @endcan
$(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('properties.index') !!}';
            window.dtDefaultOptions.columns = [
                @can('property_delete')
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endcan
                {data: 'name', name: 'name'},
                {data: 'label', name: 'label'},
                {data: 'uri', name: 'uri'},
                {data: 'profile.label', name: 'profile.label'},
                {data: 'in_list', name: 'in_list'},
                {data: 'in_show', name: 'in_show'},
                {data: 'in_edit', name: 'in_edit'},
                {data: 'in_create', name: 'in_create'},
                {data: 'in_rdf', name: 'in_rdf'},
                {data: 'in_xml', name: 'in_xml'},
                {data: 'symmetric_uri', name: 'symmetric_uri'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection