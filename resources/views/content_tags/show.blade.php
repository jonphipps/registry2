@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.content-tags.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.content-tags.fields.title')</th>
                            <td>{{ $content_tag->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.content-tags.fields.slug')</th>
                            <td>{{ $content_tag->slug }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#contentpages" aria-controls="contentpages" role="tab" data-toggle="tab">Pages</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="contentpages">
<table class="table table-bordered table-striped {{ count($content_pages) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
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

            <p>&nbsp;</p>

            <a href="{{ route('content_tags.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop