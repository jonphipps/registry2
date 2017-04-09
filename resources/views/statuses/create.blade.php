@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.status.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['statuses.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('dispay_order', 'Dispay order', ['class' => 'control-label']) !!}
                    {!! Form::number('dispay_order', old('dispay_order'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('dispay_order'))
                        <p class="help-block">
                            {{ $errors->first('dispay_order') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('display_name', 'Display name*', ['class' => 'control-label']) !!}
                    {!! Form::text('display_name', old('display_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('display_name'))
                        <p class="help-block">
                            {{ $errors->first('display_name') }}
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
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

