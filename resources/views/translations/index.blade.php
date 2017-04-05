@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.translation.title')</h3>
    @can('translation_create')
    <p>
        <a href="{{ route('translations.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped ajaxTable @can('translation_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('translation_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.translation.fields.res')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('translation_delete')
            window.route_mass_crud_entries_destroy = '{{ route('translations.mass_destroy') }}';
        @endcan
$(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('translations.index') !!}';
            window.dtDefaultOptions.columns = [
                @can('translation_delete')
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endcan
                {data: 'res.label', name: 'res.label'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection