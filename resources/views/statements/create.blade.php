@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.statement.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['statements.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('value', 'Value*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('value', old('value'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('value'))
                        <p class="help-block">
                            {{ $errors->first('value') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('translation_id', 'Translation', ['class' => 'control-label']) !!}
                    {!! Form::select('translation_id', $translations, old('translation_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('translation_id'))
                        <p class="help-block">
                            {{ $errors->first('translation_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('elementset_id', 'Element Sets', ['class' => 'control-label']) !!}
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
                    {!! Form::label('property_id', 'Property', ['class' => 'control-label']) !!}
                    {!! Form::select('property_id', $properties, old('property_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('property_id'))
                        <p class="help-block">
                            {{ $errors->first('property_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('concept_id', 'Concept', ['class' => 'control-label']) !!}
                    {!! Form::select('concept_id', $concepts, old('concept_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('concept_id'))
                        <p class="help-block">
                            {{ $errors->first('concept_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('element_id', 'Element', ['class' => 'control-label']) !!}
                    {!! Form::select('element_id', $elements, old('element_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('element_id'))
                        <p class="help-block">
                            {{ $errors->first('element_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

