@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.content-categories.title')</h3>
    @can('content_category_create')
    <p>
        <a href="{{ route('content_categories.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($content_categories) > 0 ? 'datatable' : '' }} @can('content_category_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('content_category_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.content-categories.fields.title')</th>
                        <th>@lang('quickadmin.content-categories.fields.slug')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($content_categories) > 0)
                        @foreach ($content_categories as $content_category)
                            <tr data-entry-id="{{ $content_category->id }}">
                                @can('content_category_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $content_category->title }}</td>
                                <td>{{ $content_category->slug }}</td>
                                <td>
                                    @can('content_category_view')
                                    <a href="{{ route('content_categories.show',[$content_category->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('content_category_edit')
                                    <a href="{{ route('content_categories.edit',[$content_category->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('content_category_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['content_categories.destroy', $content_category->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('content_category_delete')
            window.route_mass_crud_entries_destroy = '{{ route('content_categories.mass_destroy') }}';
        @endcan

    </script>
@endsection