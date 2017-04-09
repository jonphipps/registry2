@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.status.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.status.fields.dispay-order')</th>
                            <td>{{ $status->dispay_order }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.status.fields.display-name')</th>
                            <td>{{ $status->display_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.status.fields.uri')</th>
                            <td>{{ $status->uri }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('statuses.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop