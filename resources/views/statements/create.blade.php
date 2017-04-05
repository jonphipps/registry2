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
                    {!! Form::label('res_id', 'Res', ['class' => 'control-label']) !!}
                    {!! Form::select('res_id', $res, old('res_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('res_id'))
                        <p class="help-block">
                            {{ $errors->first('res_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

