@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.statement.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.statement.fields.value')</th>
                            <td>{!! $statement->value !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.statement.fields.translation')</th>
                            <td>{{ $statement->translation-> or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.statement.fields.res')</th>
                            <td>{{ $statement->res->label or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('statements.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop