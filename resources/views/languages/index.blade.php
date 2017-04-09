@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.language.title')</h3>
    @can('language_create')
    <p>
        <a href="{{ route('languages.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped ajaxTable @can('language_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('language_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.language.fields.code')</th>
                        <th>@lang('quickadmin.language.fields.label')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('language_delete')
            window.route_mass_crud_entries_destroy = '{{ route('languages.mass_destroy') }}';
        @endcan
$(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('languages.index') !!}';
            window.dtDefaultOptions.columns = [
                @can('language_delete')
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endcan
                {data: 'code', name: 'code'},
                {data: 'label', name: 'label'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection