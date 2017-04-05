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
                    {!! Form::label('res_id', 'Resource', ['class' => 'control-label']) !!}
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

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop
