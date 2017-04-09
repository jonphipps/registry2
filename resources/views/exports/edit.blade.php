@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.export.title')</h3>
    
    {!! Form::model($export, ['method' => 'PUT', 'route' => ['exports.update', $export->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('elementset_id', 'Element Set', ['class' => 'control-label']) !!}
                    {!! Form::select('elementset_id', $elementsets, old('elementset_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('elementset_id'))
                        <p class="help-block">
                            {{ $errors->first('elementset_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('excude_deprecated', 'Excude deprecated', ['class' => 'control-label']) !!}
                    {!! Form::hidden('excude_deprecated', 0) !!}
                    {!! Form::checkbox('excude_deprecated', 1, old('excude_deprecated')) !!}
                    <p class="help-block"></p>
                    @if($errors->has('excude_deprecated'))
                        <p class="help-block">
                            {{ $errors->first('excude_deprecated') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('include_generated', 'Include generated', ['class' => 'control-label']) !!}
                    {!! Form::hidden('include_generated', 0) !!}
                    {!! Form::checkbox('include_generated', 1, old('include_generated')) !!}
                    <p class="help-block"></p>
                    @if($errors->has('include_generated'))
                        <p class="help-block">
                            {{ $errors->first('include_generated') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('include_deleted', 'Include deleted', ['class' => 'control-label']) !!}
                    {!! Form::hidden('include_deleted', 0) !!}
                    {!! Form::checkbox('include_deleted', 1, old('include_deleted')) !!}
                    <p class="help-block"></p>
                    @if($errors->has('include_deleted'))
                        <p class="help-block">
                            {{ $errors->first('include_deleted') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('selected_columns', 'Selected columns', ['class' => 'control-label']) !!}
                    {!! Form::textarea('selected_columns', old('selected_columns'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('selected_columns'))
                        <p class="help-block">
                            {{ $errors->first('selected_columns') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('selected_language', 'Selected language', ['class' => 'control-label']) !!}
                    {!! Form::text('selected_language', old('selected_language'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('selected_language'))
                        <p class="help-block">
                            {{ $errors->first('selected_language') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('published_english_version', 'Published english version', ['class' => 'control-label']) !!}
                    {!! Form::text('published_english_version', old('published_english_version'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('published_english_version'))
                        <p class="help-block">
                            {{ $errors->first('published_english_version') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('published_language_version', 'Published language version', ['class' => 'control-label']) !!}
                    {!! Form::text('published_language_version', old('published_language_version'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('published_language_version'))
                        <p class="help-block">
                            {{ $errors->first('published_language_version') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('profile_id', 'Profile', ['class' => 'control-label']) !!}
                    {!! Form::select('profile_id', $profiles, old('profile_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('profile_id'))
                        <p class="help-block">
                            {{ $errors->first('profile_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script src="{{ url('quickadmin/js') }}/timepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
    <script>
        $('.datetime').datetimepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}",
            timeFormat: "HH:mm:ss"
        });
    </script>

@stop