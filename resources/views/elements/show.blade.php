@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.element.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.element.fields.name')</th>
                            <td>{{ $element->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.element.fields.label')</th>
                            <td>{{ $element->label }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.element.fields.uri')</th>
                            <td>{{ $element->uri }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.element.fields.description')</th>
                            <td>{!! $element->description !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.element.fields.json')</th>
                            <td>{!! $element->json !!}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#translation" aria-controls="translation" role="tab" data-toggle="tab">Translations</a></li>
<li role="presentation" class=""><a href="#statement" aria-controls="statement" role="tab" data-toggle="tab">Statements</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="translation">
<table class="table table-bordered table-striped {{ count($translations) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.translation.fields.concept')</th>
                        <th>@lang('quickadmin.translation.fields.element')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($translations) > 0)
            @foreach ($translations as $translation)
                <tr data-entry-id="{{ $translation->id }}">
                    <td>{{ $translation->concept->label or '' }}</td>
                                <td>{{ $translation->element->label or '' }}</td>
                                <td>
                                    @can('translation_view')
                                    <a href="{{ route('translations.show',[$translation->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('translation_edit')
                                    <a href="{{ route('translations.edit',[$translation->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('translation_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['translations.destroy', $translation->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="9">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="statement">
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

            <a href="{{ route('elements.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop