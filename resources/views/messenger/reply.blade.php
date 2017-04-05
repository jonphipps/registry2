@extends('messenger.template')

@section('title', 'New message')

@section('messenger-content')

    <div class="row">
        <div class="col-md-12">
            {{--{!! Form::open(['route' => ['messenger.save'], 'method' => 'POST', 'novalidate', 'class' => 'stepperForm validate']) !!}--}}
            {!! Form::model($topic, ['method' => 'PUT', 'route' => ['messenger.update', $topic->id]]) !!}

            @include('messenger.form-partials.fields')

            {!! Form::submit('Reply', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@stop
