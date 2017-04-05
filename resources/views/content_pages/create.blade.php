@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.content-pages.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['content_pages.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', 'Title*', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('category_id', 'Categories', ['class' => 'control-label']) !!}
                    {!! Form::select('category_id[]', $category_ids, old('category_id'), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('category_id'))
                        <p class="help-block">
                            {{ $errors->first('category_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('tag_id', 'Tags', ['class' => 'control-label']) !!}
                    {!! Form::select('tag_id[]', $tag_ids, old('tag_id'), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('tag_id'))
                        <p class="help-block">
                            {{ $errors->first('tag_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('page_text', 'Page text', ['class' => 'control-label']) !!}
                    {!! Form::textarea('page_text', old('page_text'), ['class' => 'form-control editor', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('page_text'))
                        <p class="help-block">
                            {{ $errors->first('page_text') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('excerpt', 'Excerpt', ['class' => 'control-label']) !!}
                    {!! Form::textarea('excerpt', old('excerpt'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('excerpt'))
                        <p class="help-block">
                            {{ $errors->first('excerpt') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('featured_image', 'Featured image', ['class' => 'control-label']) !!}
                    {!! Form::file('featured_image', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('featured_image_max_size', 0) !!}
                    {!! Form::hidden('featured_image_max_width', 0) !!}
                    {!! Form::hidden('featured_image_max_height', 0) !!}
                    <p class="help-block"></p>
                    @if($errors->has('featured_image'))
                        <p class="help-block">
                            {{ $errors->first('featured_image') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script src="//cdn.ckeditor.com/4.5.4/full/ckeditor.js"></script>
    <script>
        $('.editor').each(function () {
                  CKEDITOR.replace($(this).attr('id'),{
                    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
                    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
            });
        });
    </script>

@stop