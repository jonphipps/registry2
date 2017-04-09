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
                        <tr>
                            <th>@lang('quickadmin.vocabulary.fields.json')</th>
                            <td>{!! $vocabulary->json !!}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#export" aria-controls="export" role="tab" data-toggle="tab">Exports</a></li>
<li role="presentation" class=""><a href="#translation" aria-controls="translation" role="tab" data-toggle="tab">Translations</a></li>
<li role="presentation" class=""><a href="#import" aria-controls="import" role="tab" data-toggle="tab">Imports</a></li>
<li role="presentation" class=""><a href="#statement" aria-controls="statement" role="tab" data-toggle="tab">Statements</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="export">
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
<div role="tabpanel" class="tab-pane " id="translation">
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
<div role="tabpanel" class="tab-pane " id="import">
<table class="table table-bordered table-striped {{ count($imports) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.import.fields.elementset')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($imports) > 0)
            @foreach ($imports as $import)
                <tr data-entry-id="{{ $import->id }}">
                    <td>{{ $import->elementset->label or '' }}</td>
                                <td>
                                    @can('import_view')
                                    <a href="{{ route('imports.show',[$import->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('import_edit')
                                    <a href="{{ route('imports.edit',[$import->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('import_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['imports.destroy', $import->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="16">@lang('quickadmin.qa_no_entries_in_table')</td>
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

            <a href="{{ route('vocabularies.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop