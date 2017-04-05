@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.vocabulary.title')</h3>
    @can('vocabulary_create')
    <p>
        <a href="{{ route('vocabularies.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped ajaxTable @can('vocabulary_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('vocabulary_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.vocabulary.fields.label')</th>
                        <th>@lang('quickadmin.vocabulary.fields.description')</th>
                        <th>@lang('quickadmin.vocabulary.fields.uri')</th>
                        <th>@lang('quickadmin.vocabulary.fields.project')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('vocabulary_delete')
            window.route_mass_crud_entries_destroy = '{{ route('vocabularies.mass_destroy') }}';
        @endcan
$(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('vocabularies.index') !!}';
            window.dtDefaultOptions.columns = [
                @can('vocabulary_delete')
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endcan
                {data: 'label', name: 'label'},
                {data: 'description', name: 'description'},
                {data: 'uri', name: 'uri'},
                {data: 'project.label', name: 'project.label'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection