@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.content-pages.title')</h3>
    @can('content_page_create')
    <p>
        <a href="{{ route('content_pages.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($content_pages) > 0 ? 'datatable' : '' }} @can('content_page_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('content_page_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.content-pages.fields.title')</th>
                        <th>@lang('quickadmin.content-pages.fields.category-id')</th>
                        <th>@lang('quickadmin.content-pages.fields.tag-id')</th>
                        <th>@lang('quickadmin.content-pages.fields.page-text')</th>
                        <th>@lang('quickadmin.content-pages.fields.excerpt')</th>
                        <th>@lang('quickadmin.content-pages.fields.featured-image')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($content_pages) > 0)
                        @foreach ($content_pages as $content_page)
                            <tr data-entry-id="{{ $content_page->id }}">
                                @can('content_page_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $content_page->title }}</td>
                                <td>
                                    @foreach ($content_page->category_id as $singleCategoryId)
                                        <span class="label label-info label-many">{{ $singleCategoryId->title }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($content_page->tag_id as $singleTagId)
                                        <span class="label label-info label-many">{{ $singleTagId->title }}</span>
                                    @endforeach
                                </td>
                                <td>{!! $content_page->page_text !!}</td>
                                <td>{!! $content_page->excerpt !!}</td>
                                <td>@if($content_page->featured_image)<a href="{{ asset('uploads/' . $content_page->featured_image) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $content_page->featured_image) }}"/></a>@endif</td>
                                <td>
                                    @can('content_page_view')
                                    <a href="{{ route('content_pages.show',[$content_page->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('content_page_edit')
                                    <a href="{{ route('content_pages.edit',[$content_page->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('content_page_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['content_pages.destroy', $content_page->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('content_page_delete')
            window.route_mass_crud_entries_destroy = '{{ route('content_pages.mass_destroy') }}';
        @endcan

    </script>
@endsection