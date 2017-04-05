@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.res.title')</h3>
    
    {!! Form::model($re, ['method' => 'PUT', 'route' => ['res.update', $re->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('label', 'Label*', ['class' => 'control-label']) !!}
                    {!! Form::text('label', old('label'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('label'))
                        <p class="help-block">
                            {{ $errors->first('label') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('uri', 'Uri*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('members', 'Members', ['class' => 'control-label']) !!}
                    {!! Form::select('members[]', $members, old('members') ? old('members') : $re->members->pluck('id')->toArray(), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('members'))
                        <p class="help-block">
                            {{ $errors->first('members') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('profile_id', 'Profile*', ['class' => 'control-label']) !!}
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

