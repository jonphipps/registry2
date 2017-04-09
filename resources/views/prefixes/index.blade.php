@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.prefix.title')</h3>
    @can('prefix_create')
    <p>
        <a href="{{ route('prefixes.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped ajaxTable @can('prefix_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('prefix_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.prefix.fields.prefix')</th>
                        <th>@lang('quickadmin.prefix.fields.uri')</th>
                        <th>@lang('quickadmin.prefix.fields.rank')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('prefix_delete')
            window.route_mass_crud_entries_destroy = '{{ route('prefixes.mass_destroy') }}';
        @endcan
$(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('prefixes.index') !!}';
            window.dtDefaultOptions.columns = [
                @can('prefix_delete')
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endcan
                {data: 'prefix', name: 'prefix'},
                {data: 'uri', name: 'uri'},
                {data: 'rank', name: 'rank'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection