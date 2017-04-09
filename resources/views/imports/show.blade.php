@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.import.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.import.fields.map')</th>
                            <td>{!! $import->map !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.import.fields.user')</th>
                            <td>{{ $import->user->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.import.fields.vocabulary')</th>
                            <td>{{ $import->vocabulary->label or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.import.fields.elementset')</th>
                            <td>{{ $import->elementset->label or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.import.fields.source-file-name')</th>
                            <td>@if($import->source_file_name)<a href="{{ asset('uploads/'.$import->source_file_name) }}" target="_blank">Download file</a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.import.fields.file-name')</th>
                            <td>{{ $import->file_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.import.fields.file-type')</th>
                            <td>{{ $import->file_type }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.import.fields.results')</th>
                            <td>{!! $import->results !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.import.fields.total-processed-count')</th>
                            <td>{{ $import->total_processed_count }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.import.fields.error-count')</th>
                            <td>{{ $import->error_count }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.import.fields.success-count')</th>
                            <td>{{ $import->success_count }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.import.fields.batch')</th>
                            <td>{{ $import->batch->run_description or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('imports.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop