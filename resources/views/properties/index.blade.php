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
                        <th>@lang('quickadmin.property.fields.uri')</th>
                        <th>@lang('quickadmin.property.fields.profile')</th>
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
                {data: 'uri', name: 'uri'},
                {data: 'profile.label', name: 'profile.label'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection