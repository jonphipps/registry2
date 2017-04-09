@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.datatype.title')</h3>
    @can('datatype_create')
    <p>
        <a href="{{ route('datatypes.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped ajaxTable @can('datatype_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('datatype_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.datatype.fields.name')</th>
                        <th>@lang('quickadmin.datatype.fields.label')</th>
                        <th>@lang('quickadmin.datatype.fields.description')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('datatype_delete')
            window.route_mass_crud_entries_destroy = '{{ route('datatypes.mass_destroy') }}';
        @endcan
$(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('datatypes.index') !!}';
            window.dtDefaultOptions.columns = [
                @can('datatype_delete')
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endcan
                {data: 'name', name: 'name'},
                {data: 'label', name: 'label'},
                {data: 'description', name: 'description'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection