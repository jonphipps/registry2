@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.content-pages.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.content-pages.fields.title')</th>
                            <td>{{ $content_page->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.content-pages.fields.category-id')</th>
                            <td>
                                @foreach ($content_page->category_id as $singleCategoryId)
                                    <span class="label label-info label-many">{{ $singleCategoryId->title }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.content-pages.fields.tag-id')</th>
                            <td>
                                @foreach ($content_page->tag_id as $singleTagId)
                                    <span class="label label-info label-many">{{ $singleTagId->title }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.content-pages.fields.page-text')</th>
                            <td>{!! $content_page->page_text !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.content-pages.fields.excerpt')</th>
                            <td>{!! $content_page->excerpt !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.content-pages.fields.featured-image')</th>
                            <td>@if($content_page->featured_image)<a href="{{ asset('uploads/' . $content_page->featured_image) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $content_page->featured_image) }}"/></a>@endif</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('content_pages.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop