@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.releases.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.releases.fields.sha')</th>
                            <td>{{ $release->sha }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.releases.fields.tag')</th>
                            <td>{{ $release->tag }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.releases.fields.notes')</th>
                            <td>{!! $release->notes !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.releases.fields.project')</th>
                            <td>{{ $release->project->label or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('releases.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop