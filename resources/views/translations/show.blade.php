@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.translation.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.translation.fields.res')</th>
                            <td>{{ $translation->res->label or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#statement" aria-controls="statement" role="tab" data-toggle="tab">Statement</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="statement">
<table class="table table-bordered table-striped {{ count($statements) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.statement.fields.value')</th>
                        <th>@lang('quickadmin.statement.fields.translation')</th>
                        <th>@lang('quickadmin.statement.fields.res')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($statements) > 0)
            @foreach ($statements as $statement)
                <tr data-entry-id="{{ $statement->id }}">
                    <td>{!! $statement->value !!}</td>
                                <td>{{ $statement->translation-> or '' }}</td>
                                <td>{{ $statement->res->label or '' }}</td>
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
                <td colspan="7">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('translations.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop