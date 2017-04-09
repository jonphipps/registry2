@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.export.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.export.fields.user')</th>
                            <td>{{ $export->user->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.export.fields.vocabulary')</th>
                            <td>{{ $export->vocabulary->label or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.export.fields.elementset')</th>
                            <td>{{ $export->elementset->label or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.export.fields.excude-deprecated')</th>
                            <td>{{ Form::checkbox("excude_deprecated", 1, $export->excude_deprecated == 1, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.export.fields.include-generated')</th>
                            <td>{{ Form::checkbox("include_generated", 1, $export->include_generated == 1, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.export.fields.include-deleted')</th>
                            <td>{{ Form::checkbox("include_deleted", 1, $export->include_deleted == 1, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.export.fields.selected-columns')</th>
                            <td>{!! $export->selected_columns !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.export.fields.selected-language')</th>
                            <td>{{ $export->selected_language }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.export.fields.published-english-version')</th>
                            <td>{{ $export->published_english_version }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.export.fields.published-language-version')</th>
                            <td>{{ $export->published_language_version }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.export.fields.last-vocab-update')</th>
                            <td>{{ $export->last_vocab_update }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.export.fields.profile')</th>
                            <td>{{ $export->profile->label or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.export.fields.file')</th>
                            <td>{{ $export->file }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.export.fields.map')</th>
                            <td>{!! $export->map !!}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('exports.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop