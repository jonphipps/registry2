@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.property.title')</h3>
    
    {!! Form::model($property, ['method' => 'PUT', 'route' => ['properties.update', $property->id]]) !!}

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
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('in_list', 'In list', ['class' => 'control-label']) !!}
                    {!! Form::hidden('in_list', 0) !!}
                    {!! Form::checkbox('in_list', 1, old('in_list')) !!}
                    <p class="help-block"></p>
                    @if($errors->has('in_list'))
                        <p class="help-block">
                            {{ $errors->first('in_list') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('in_show', 'In show', ['class' => 'control-label']) !!}
                    {!! Form::hidden('in_show', 0) !!}
                    {!! Form::checkbox('in_show', 1, old('in_show')) !!}
                    <p class="help-block"></p>
                    @if($errors->has('in_show'))
                        <p class="help-block">
                            {{ $errors->first('in_show') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('in_edit', 'In edit', ['class' => 'control-label']) !!}
                    {!! Form::hidden('in_edit', 0) !!}
                    {!! Form::checkbox('in_edit', 1, old('in_edit')) !!}
                    <p class="help-block"></p>
                    @if($errors->has('in_edit'))
                        <p class="help-block">
                            {{ $errors->first('in_edit') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('in_create', 'In create', ['class' => 'control-label']) !!}
                    {!! Form::hidden('in_create', 0) !!}
                    {!! Form::checkbox('in_create', 1, old('in_create')) !!}
                    <p class="help-block"></p>
                    @if($errors->has('in_create'))
                        <p class="help-block">
                            {{ $errors->first('in_create') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('in_rdf', 'In rdf', ['class' => 'control-label']) !!}
                    {!! Form::hidden('in_rdf', 0) !!}
                    {!! Form::checkbox('in_rdf', 1, old('in_rdf')) !!}
                    <p class="help-block"></p>
                    @if($errors->has('in_rdf'))
                        <p class="help-block">
                            {{ $errors->first('in_rdf') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('in_xml', 'In xml', ['class' => 'control-label']) !!}
                    {!! Form::hidden('in_xml', 0) !!}
                    {!! Form::checkbox('in_xml', 1, old('in_xml')) !!}
                    <p class="help-block"></p>
                    @if($errors->has('in_xml'))
                        <p class="help-block">
                            {{ $errors->first('in_xml') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('symmetric_uri', 'Symmetric uri', ['class' => 'control-label']) !!}
                    {!! Form::text('symmetric_uri', old('symmetric_uri'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('symmetric_uri'))
                        <p class="help-block">
                            {{ $errors->first('symmetric_uri') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

