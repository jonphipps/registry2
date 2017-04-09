@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.prefix.title')</h3>
    
    {!! Form::model($prefix, ['method' => 'PUT', 'route' => ['prefixes.update', $prefix->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('prefix', 'Prefix*', ['class' => 'control-label']) !!}
                    {!! Form::text('prefix', old('prefix'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('prefix'))
                        <p class="help-block">
                            {{ $errors->first('prefix') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('uri', 'URI*', ['class' => 'control-label']) !!}
                    {!! Form::text('uri', old('uri'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('uri'))
                        <p class="help-block">
                            {{ $errors->first('uri') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('rank', 'Rank', ['class' => 'control-label']) !!}
                    {!! Form::number('rank', old('rank'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('rank'))
                        <p class="help-block">
                            {{ $errors->first('rank') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

