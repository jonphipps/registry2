@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.concept.title')</h3>
    @can('concept_create')
    <p>
        <a href="{{ route('concepts.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped ajaxTable @can('concept_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('concept_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.concept.fields.label')</th>
                        <th>@lang('quickadmin.concept.fields.uri')</th>
                        <th>@lang('quickadmin.concept.fields.description')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('concept_delete')
            window.route_mass_crud_entries_destroy = '{{ route('concepts.mass_destroy') }}';
        @endcan
$(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('concepts.index') !!}';
            window.dtDefaultOptions.columns = [
                @can('concept_delete')
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