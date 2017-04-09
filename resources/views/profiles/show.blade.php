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
                        <tr>
                            <th>@lang('quickadmin.profile.fields.type')</th>
                            <td>{{ $profile->type }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#property" aria-controls="property" role="tab" data-toggle="tab">Properties</a></li>
<li role="presentation" class=""><a href="#export" aria-controls="export" role="tab" data-toggle="tab">Exports</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="property">
<table class="table table-bordered table-striped {{ count($properties) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.property.fields.name')</th>
                        <th>@lang('quickadmin.property.fields.uri')</th>
                        <th>@lang('quickadmin.property.fields.profile')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($properties) > 0)
            @foreach ($properties as $property)
                <tr data-entry-id="{{ $property->id }}">
                    <td>{{ $property->name }}</td>
                                <td>{{ $property->uri }}</td>
                                <td>{{ $property->profile->label or '' }}</td>
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
<div role="tabpanel" class="tab-pane " id="export">
<table class="table table-bordered table-striped {{ count($exports) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.export.fields.elementset')</th>
                        <th>@lang('quickadmin.export.fields.selected-language')</th>
                        <th>@lang('quickadmin.export.fields.published-english-version')</th>
                        <th>@lang('quickadmin.export.fields.published-language-version')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($exports) > 0)
            @foreach ($exports as $export)
                <tr data-entry-id="{{ $export->id }}">
                    <td>{{ $export->elementset->label or '' }}</td>
                                <td>{{ $export->selected_language }}</td>
                                <td>{{ $export->published_english_version }}</td>
                                <td>{{ $export->published_language_version }}</td>
                                <td>
                                    @can('export_view')
                                    <a href="{{ route('exports.show',[$export->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('export_edit')
                                    <a href="{{ route('exports.edit',[$export->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('export_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['exports.destroy', $export->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="18">@lang('quickadmin.qa_no_entries_in_table')</td>
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