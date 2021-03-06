@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.element.title')</h3>
    @can('element_create')
    <p>
        <a href="{{ route('elements.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped ajaxTable @can('element_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('element_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.element.fields.label')</th>
                        <th>@lang('quickadmin.element.fields.uri')</th>
                        <th>@lang('quickadmin.element.fields.description')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('element_delete')
            window.route_mass_crud_entries_destroy = '{{ route('elements.mass_destroy') }}';
        @endcan
$(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('elements.index') !!}';
            window.dtDefaultOptions.columns = [
                @can('element_delete')
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endcan
                {data: 'label', name: 'label'},
                {data: 'uri', name: 'uri'},
                {data: 'description', name: 'description'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection