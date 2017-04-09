@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.status.title')</h3>
    @can('status_create')
    <p>
        <a href="{{ route('statuses.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped ajaxTable @can('status_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('status_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.status.fields.display-name')</th>
                        <th>@lang('quickadmin.status.fields.uri')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('status_delete')
            window.route_mass_crud_entries_destroy = '{{ route('statuses.mass_destroy') }}';
        @endcan
$(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('statuses.index') !!}';
            window.dtDefaultOptions.columns = [
                @can('status_delete')
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endcan
                {data: 'display_name', name: 'display_name'},
                {data: 'uri', name: 'uri'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection