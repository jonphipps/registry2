@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.profile.title')</h3>
    @can('profile_create')
    <p>
        <a href="{{ route('profiles.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped ajaxTable @can('profile_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('profile_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.profile.fields.name')</th>
                        <th>@lang('quickadmin.profile.fields.label')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('profile_delete')
            window.route_mass_crud_entries_destroy = '{{ route('profiles.mass_destroy') }}';
        @endcan
$(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('profiles.index') !!}';
            window.dtDefaultOptions.columns = [
                @can('profile_delete')
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endcan
                {data: 'name', name: 'name'},
                {data: 'label', name: 'label'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection