@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.datatype.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.datatype.fields.name')</th>
                            <td>{{ $datatype->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.datatype.fields.label')</th>
                            <td>{{ $datatype->label }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.datatype.fields.description')</th>
                            <td>{!! $datatype->description !!}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('datatypes.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop