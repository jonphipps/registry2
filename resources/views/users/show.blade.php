@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.users.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.users.fields.name')</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.email')</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.password')</th>
                            <td>---</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.role')</th>
                            <td>{{ $user->role->title or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.remember-token')</th>
                            <td>{{ $user->remember_token }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#useractions" aria-controls="useractions" role="tab" data-toggle="tab">User actions</a></li>
<li role="presentation" class=""><a href="#elementset" aria-controls="elementset" role="tab" data-toggle="tab">Elementset</a></li>
<li role="presentation" class=""><a href="#res" aria-controls="res" role="tab" data-toggle="tab">Res</a></li>
<li role="presentation" class=""><a href="#vocabulary" aria-controls="vocabulary" role="tab" data-toggle="tab">Vocabulary</a></li>
<li role="presentation" class=""><a href="#project" aria-controls="project" role="tab" data-toggle="tab">Project</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="useractions">
<table class="table table-bordered table-striped {{ count($user_actions) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.user-actions.created_at')</th>
                        <th>@lang('quickadmin.user-actions.fields.user')</th>
                        <th>@lang('quickadmin.user-actions.fields.action')</th>
                        <th>@lang('quickadmin.user-actions.fields.action-model')</th>
                        <th>@lang('quickadmin.user-actions.fields.action-id')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($user_actions) > 0)
            @foreach ($user_actions as $user_action)
                <tr data-entry-id="{{ $user_action->id }}">
                    <td>{{ $user_action->created_at or '' }}</td>
                                <td>{{ $user_action->user->name or '' }}</td>
                                <td>{{ $user_action->action }}</td>
                                <td>{{ $user_action->action_model }}</td>
                                <td>{{ $user_action->action_id }}</td>
                                <td>
                                    @can('user_action_view')
                                    <a href="{{ route('user_actions.show',[$user_action->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="elementset">
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
<div role="tabpanel" class="tab-pane " id="project">
<table class="table table-bordered table-striped {{ count($projects) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.project.fields.label')</th>
                        <th>@lang('quickadmin.project.fields.description')</th>
                        <th>@lang('quickadmin.project.fields.uri')</th>
                        <th>@lang('quickadmin.project.fields.members')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($projects) > 0)
            @foreach ($projects as $project)
                <tr data-entry-id="{{ $project->id }}">
                    <td>{{ $project->label }}</td>
                                <td>{!! $project->description !!}</td>
                                <td>{{ $project->uri }}</td>
                                <td>
                                    @foreach ($project->members as $singleMembers)
                                        <span class="label label-info label-many">{{ $singleMembers->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @can('project_view')
                                    <a href="{{ route('projects.show',[$project->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('project_edit')
                                    <a href="{{ route('projects.edit',[$project->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('project_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['projects.destroy', $project->id])) !!}
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

            <a href="{{ route('users.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop