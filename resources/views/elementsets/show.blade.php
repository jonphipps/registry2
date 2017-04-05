@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.elementset.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.elementset.fields.name')</th>
                            <td>{{ $elementset->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.elementset.fields.label')</th>
                            <td>{{ $elementset->label }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.elementset.fields.description')</th>
                            <td>{!! $elementset->description !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.elementset.fields.uri')</th>
                            <td>{{ $elementset->uri }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.elementset.fields.members')</th>
                            <td>
                                @foreach ($elementset->members as $singleMembers)
                                    <span class="label label-info label-many">{{ $singleMembers->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.elementset.fields.project')</th>
                            <td>{{ $elementset->project->label or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('elementsets.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop