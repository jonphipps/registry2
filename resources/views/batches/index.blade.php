@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.batch.title')</h3>
    @can('batch_create')
    <p>
        <a href="{{ route('batches.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped ajaxTable @can('batch_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('batch_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.batch.fields.run-time')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('batch_delete')
            window.route_mass_crud_entries_destroy = '{{ route('batches.mass_destroy') }}';
        @endcan
$(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('batches.index') !!}';
            window.dtDefaultOptions.columns = [
                @can('batch_delete')
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endcan
                {data: 'run_time', name: 'run_time'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection