@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.vocabulary.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.vocabulary.fields.name')</th>
                            <td>{{ $vocabulary->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.vocabulary.fields.label')</th>
                            <td>{{ $vocabulary->label }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.vocabulary.fields.description')</th>
                            <td>{!! $vocabulary->description !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.vocabulary.fields.uri')</th>
                            <td>{{ $vocabulary->uri }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.vocabulary.fields.members')</th>
                            <td>
                                @foreach ($vocabulary->members as $singleMembers)
                                    <span class="label label-info label-many">{{ $singleMembers->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.vocabulary.fields.project')</th>
                            <td>{{ $vocabulary->project->label or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('vocabularies.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop