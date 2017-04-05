@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.project.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.project.fields.name')</th>
                            <td>{{ $project->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.project.fields.label')</th>
                            <td>{{ $project->label }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.project.fields.repo')</th>
                            <td>{{ $project->repo }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.project.fields.description')</th>
                            <td>{!! $project->description !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.project.fields.uri')</th>
                            <td>{{ $project->uri }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.project.fields.members')</th>
                            <td>
                                @foreach ($project->members as $singleMembers)
                                    <span class="label label-info label-many">{{ $singleMembers->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#elementset" aria-controls="elementset" role="tab" data-toggle="tab">Elementset</a></li>
<li role="presentation" class=""><a href="#res" aria-controls="res" role="tab" data-toggle="tab">Res</a></li>
<li role="presentation" class=""><a href="#vocabulary" aria-controls="vocabulary" role="tab" data-toggle="tab">Vocabulary</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="elementset">
<table class="table table-bordered table-striped {{ count($elementsets) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.elementset.fields.label')</th>
                        <th>@lang('quickadmin.elementset.fields.description')</th>
                        <th>@lang('quickadmin.elementset.fields.uri')</th>
                        <th>@lang('quickadmin.elementset.fields.project')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($elementsets) > 0)
            @foreach ($elementsets as $elementset)
                <tr data-entry-id="{{ $elementset->id }}">
                    <td>{{ $elementset->label }}</td>
                                <td>{!! $elementset->description !!}</td>
                                <td>{{ $elementset->uri }}</td>
                                <td>{{ $elementset->project->label or '' }}</td>
                                <td>
                                    @can('elementset_view')
                                    <a href="{{ route('elementsets.show',[$elementset->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('elementset_edit')
                                    <a href="{{ route('elementsets.edit',[$elementset->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('elementset_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['elementsets.destroy', $elementset->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="10">@lang('quickadmin.qa_no_entries_in_table')</td>
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
<div role="tabpanel" class="tab-pane " id="vocabulary">
<table class="table table-bordered table-striped {{ count($vocabularies) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.vocabulary.fields.label')</th>
                        <th>@lang('quickadmin.vocabulary.fields.description')</th>
                        <th>@lang('quickadmin.vocabulary.fields.uri')</th>
                        <th>@lang('quickadmin.vocabulary.fields.project')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($vocabularies) > 0)
            @foreach ($vocabularies as $vocabulary)
                <tr data-entry-id="{{ $vocabulary->id }}">
                    <td>{{ $vocabulary->label }}</td>
                                <td>{!! $vocabulary->description !!}</td>
                                <td>{{ $vocabulary->uri }}</td>
                                <td>{{ $vocabulary->project->label or '' }}</td>
                                <td>
                                    @can('vocabulary_view')
                                    <a href="{{ route('vocabularies.show',[$vocabulary->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('vocabulary_edit')
                                    <a href="{{ route('vocabularies.edit',[$vocabulary->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('vocabulary_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['vocabularies.destroy', $vocabulary->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="10">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('projects.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop