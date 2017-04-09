@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.statement.title')</h3>
    @can('statement_create')
    <p>
        <a href="{{ route('statements.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped ajaxTable @can('statement_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('statement_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.statement.fields.value')</th>
                        <th>@lang('quickadmin.statement.fields.translation')</th>
                        <th>@lang('quickadmin.statement.fields.property')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('statement_delete')
            window.route_mass_crud_entries_destroy = '{{ route('statements.mass_destroy') }}';
        @endcan
$(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('statements.index') !!}';
            window.dtDefaultOptions.columns = [
                @can('statement_delete')
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endcan
                {data: 'value', name: 'value'},
                {data: 'translation.version', name: 'translation.version'},
                {data: 'property.label', name: 'property.label'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection