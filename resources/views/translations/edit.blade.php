@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.translation.title')</h3>
    
    {!! Form::model($translation, ['method' => 'PUT', 'route' => ['translations.update', $translation->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('version', 'Version', ['class' => 'control-label']) !!}
                    {!! Form::text('version', old('version'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('version'))
                        <p class="help-block">
                            {{ $errors->first('version') }}
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

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

