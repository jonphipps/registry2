@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.import.title')</h3>
    
    {!! Form::model($import, ['method' => 'PUT', 'route' => ['imports.update', $import->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('vocabulary_id', 'Vocabulary', ['class' => 'control-label']) !!}
                    {!! Form::select('vocabulary_id', $vocabularies, old('vocabulary_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('vocabulary_id'))
                        <p class="help-block">
                            {{ $errors->first('vocabulary_id') }}
                        </p>
                    @endif
                </div>
            </div>
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
                    {!! Form::label('source_file_name', 'File name', ['class' => 'control-label']) !!}
                    @if ($import->source_file_name)
                        <a href="{{ asset('uploads/'.$import->source_file_name) }}" target="_blank">Download file</a>
                    @endif
                    {!! Form::file('source_file_name', ['class' => 'form-control']) !!}
                    {!! Form::hidden('source_file_name_max_size', 20) !!}
                    <p class="help-block"></p>
                    @if($errors->has('source_file_name'))
                        <p class="help-block">
                            {{ $errors->first('source_file_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('file_type', 'File type', ['class' => 'control-label']) !!}
                    {!! Form::text('file_type', old('file_type'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('file_type'))
                        <p class="help-block">
                            {{ $errors->first('file_type') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

