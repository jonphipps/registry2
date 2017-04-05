@extends('messenger.template')

@section('title', 'New message')

@section('messenger-content')

    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route' => ['messenger.store'], 'method' => 'POST', 'novalidate', 'class' => 'stepperForm validate']) !!}

            @include('messenger.form-partials.fields')

            {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@stop
