@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.product-categories.title')</h3>
    @can('product_category_create')
    <p>
        <a href="{{ route('product_categories.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($product_categories) > 0 ? 'datatable' : '' }} @can('product_category_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('product_category_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.product-categories.fields.name')</th>
                        <th>@lang('quickadmin.product-categories.fields.description')</th>
                        <th>@lang('quickadmin.product-categories.fields.photo')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($product_categories) > 0)
                        @foreach ($product_categories as $product_category)
                            <tr data-entry-id="{{ $product_category->id }}">
                                @can('product_category_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $product_category->name }}</td>
                                <td>{!! $product_category->description !!}</td>
                                <td>@if($product_category->photo)<a href="{{ asset('uploads/' . $product_category->photo) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $product_category->photo) }}"/></a>@endif</td>
                                <td>
                                    @can('product_category_view')
                                    <a href="{{ route('product_categories.show',[$product_category->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('product_category_edit')
                                    <a href="{{ route('product_categories.edit',[$product_category->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('product_category_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['product_categories.destroy', $product_category->id])) !!}
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
@stop

@section('javascript') 
    <script>
        @can('product_category_delete')
            window.route_mass_crud_entries_destroy = '{{ route('product_categories.mass_destroy') }}';
        @endcan

    </script>
@endsection