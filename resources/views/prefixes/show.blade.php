@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.prefix.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.prefix.fields.prefix')</th>
                            <td>{{ $prefix->prefix }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.prefix.fields.uri')</th>
                            <td>{{ $prefix->uri }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.prefix.fields.rank')</th>
                            <td>{{ $prefix->rank }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('prefixes.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop