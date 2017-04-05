@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.profile.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.profile.fields.name')</th>
                            <td>{{ $profile->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.profile.fields.label')</th>
                            <td>{{ $profile->label }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#property" aria-controls="property" role="tab" data-toggle="tab">Property</a></li>
<li role="presentation" class=""><a href="#res" aria-controls="res" role="tab" data-toggle="tab">Res</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="property">
<table class="table table-bordered table-striped {{ count($properties) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.property.fields.name')</th>
                        <th>@lang('quickadmin.property.fields.label')</th>
                        <th>@lang('quickadmin.property.fields.uri')</th>
                        <th>@lang('quickadmin.property.fields.profile')</th>
                        <th>@lang('quickadmin.property.fields.in-list')</th>
                        <th>@lang('quickadmin.property.fields.in-show')</th>
                        <th>@lang('quickadmin.property.fields.in-edit')</th>
                        <th>@lang('quickadmin.property.fields.in-create')</th>
                        <th>@lang('quickadmin.property.fields.in-rdf')</th>
                        <th>@lang('quickadmin.property.fields.in-xml')</th>
                        <th>@lang('quickadmin.property.fields.symmetric-uri')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($properties) > 0)
            @foreach ($properties as $property)
                <tr data-entry-id="{{ $property->id }}">
                    <td>{{ $property->name }}</td>
                                <td>{{ $property->label }}</td>
                                <td>{{ $property->uri }}</td>
                                <td>{{ $property->profile->label or '' }}</td>
                                <td>{{ Form::checkbox("in_list", 1, $property->in_list == 1, ["disabled"]) }}</td>
                                <td>{{ Form::checkbox("in_show", 1, $property->in_show == 1, ["disabled"]) }}</td>
                                <td>{{ Form::checkbox("in_edit", 1, $property->in_edit == 1, ["disabled"]) }}</td>
                                <td>{{ Form::checkbox("in_create", 1, $property->in_create == 1, ["disabled"]) }}</td>
                                <td>{{ Form::checkbox("in_rdf", 1, $property->in_rdf == 1, ["disabled"]) }}</td>
                                <td>{{ Form::checkbox("in_xml", 1, $property->in_xml == 1, ["disabled"]) }}</td>
                                <td>{{ $property->symmetric_uri }}</td>
                                <td>
                                    @can('property_view')
                                    <a href="{{ route('properties.show',[$property->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('property_edit')
                                    <a href="{{ route('properties.edit',[$property->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('property_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['properties.destroy', $property->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="15">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="res">
<table class="table table-bordered table-striped {{ count($res) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.res.fields.label')</th>
                        <th>@lang('quickadmin.res.fields.description')</th>
                        <th>@lang('quickadmin.res.fields.uri')</th>
                        <th>@lang('quickadmin.res.fields.project')</th>
                        <th>@lang('quickadmin.res.fields.profile')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($res) > 0)
            @foreach ($res as $re)
                <tr data-entry-id="{{ $re->id }}">
                    <td>{{ $re->label }}</td>
                                <td>{!! $re->description !!}</td>
                                <td>{{ $re->uri }}</td>
                                <td>{{ $re->project->label or '' }}</td>
                                <td>{{ $re->profile->label or '' }}</td>
                                <td>
                                    @can('re_view')
                                    <a href="{{ route('res.show',[$re->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('re_edit')
                                    <a href="{{ route('res.edit',[$re->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('re_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['res.destroy', $re->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="12">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('profiles.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop