@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.import.title')</h3>
    @can('import_create')
    <p>
        <a href="{{ route('imports.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped ajaxTable @can('import_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('import_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.import.fields.elementset')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('import_delete')
            window.route_mass_crud_entries_destroy = '{{ route('imports.mass_destroy') }}';
        @endcan
$(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('imports.index') !!}';
            window.dtDefaultOptions.columns = [
                @can('import_delete')
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endcan
                {data: 'elementset.label', name: 'elementset.label'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection