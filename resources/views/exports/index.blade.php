@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.export.title')</h3>
    @can('export_create')
    <p>
        <a href="{{ route('exports.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped ajaxTable @can('export_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('export_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.export.fields.elementset')</th>
                        <th>@lang('quickadmin.export.fields.selected-language')</th>
                        <th>@lang('quickadmin.export.fields.published-english-version')</th>
                        <th>@lang('quickadmin.export.fields.published-language-version')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('export_delete')
            window.route_mass_crud_entries_destroy = '{{ route('exports.mass_destroy') }}';
        @endcan
$(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('exports.index') !!}';
            window.dtDefaultOptions.columns = [
                @can('export_delete')
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endcan
                {data: 'elementset.label', name: 'elementset.label'},
                {data: 'selected_language', name: 'selected_language'},
                {data: 'published_english_version', name: 'published_english_version'},
                {data: 'published_language_version', name: 'published_language_version'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection