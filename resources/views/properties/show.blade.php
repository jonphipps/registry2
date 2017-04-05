@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.property.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.property.fields.name')</th>
                            <td>{{ $property->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.property.fields.label')</th>
                            <td>{{ $property->label }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.property.fields.uri')</th>
                            <td>{{ $property->uri }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.property.fields.profile')</th>
                            <td>{{ $property->profile->label or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.property.fields.in-list')</th>
                            <td>{{ Form::checkbox("in_list", 1, $property->in_list == 1, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.property.fields.in-show')</th>
                            <td>{{ Form::checkbox("in_show", 1, $property->in_show == 1, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.property.fields.in-edit')</th>
                            <td>{{ Form::checkbox("in_edit", 1, $property->in_edit == 1, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.property.fields.in-create')</th>
                            <td>{{ Form::checkbox("in_create", 1, $property->in_create == 1, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.property.fields.in-rdf')</th>
                            <td>{{ Form::checkbox("in_rdf", 1, $property->in_rdf == 1, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.property.fields.in-xml')</th>
                            <td>{{ Form::checkbox("in_xml", 1, $property->in_xml == 1, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.property.fields.symmetric-uri')</th>
                            <td>{{ $property->symmetric_uri }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('properties.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop