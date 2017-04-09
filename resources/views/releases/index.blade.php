@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.releases.title')</h3>
    @can('release_create')
    <p>
        <a href="{{ route('releases.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped ajaxTable @can('release_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('release_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.releases.fields.tag')</th>
                        <th>@lang('quickadmin.releases.fields.project')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('release_delete')
            window.route_mass_crud_entries_destroy = '{{ route('releases.mass_destroy') }}';
        @endcan
$(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('releases.index') !!}';
            window.dtDefaultOptions.columns = [
                @can('release_delete')
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endcan
                {data: 'tag', name: 'tag'},
                {data: 'project.label', name: 'project.label'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection