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
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#statement" aria-controls="statement" role="tab" data-toggle="tab">Statements</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="statement">
<table class="table table-bordered table-striped {{ count($statements) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.statement.fields.value')</th>
                        <th>@lang('quickadmin.statement.fields.translation')</th>
                        <th>@lang('quickadmin.statement.fields.property')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($statements) > 0)
            @foreach ($statements as $statement)
                <tr data-entry-id="{{ $statement->id }}">
                    <td>{!! $statement->value !!}</td>
                                <td>{{ $statement->translation->version or '' }}</td>
                                <td>{{ $statement->property->label or '' }}</td>
                                <td>
                                    @can('statement_view')
                                    <a href="{{ route('statements.show',[$statement->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('statement_edit')
                                    <a href="{{ route('statements.edit',[$statement->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('statement_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['statements.destroy', $statement->id])) !!}
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

            <a href="{{ route('properties.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop