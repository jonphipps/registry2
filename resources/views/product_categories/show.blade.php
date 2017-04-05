@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.product-categories.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.product-categories.fields.name')</th>
                            <td>{{ $product_category->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.product-categories.fields.description')</th>
                            <td>{!! $product_category->description !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.product-categories.fields.photo')</th>
                            <td>@if($product_category->photo)<a href="{{ asset('uploads/' . $product_category->photo) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $product_category->photo) }}"/></a>@endif</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#products" aria-controls="products" role="tab" data-toggle="tab">Products</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="products">
<table class="table table-bordered table-striped {{ count($products) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.products.fields.name')</th>
                        <th>@lang('quickadmin.products.fields.description')</th>
                        <th>@lang('quickadmin.products.fields.price')</th>
                        <th>@lang('quickadmin.products.fields.category')</th>
                        <th>@lang('quickadmin.products.fields.tag')</th>
                        <th>@lang('quickadmin.products.fields.photo1')</th>
                        <th>@lang('quickadmin.products.fields.photo2')</th>
                        <th>@lang('quickadmin.products.fields.photo3')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($products) > 0)
            @foreach ($products as $product)
                <tr data-entry-id="{{ $product->id }}">
                    <td>{{ $product->name }}</td>
                                <td>{!! $product->description !!}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    @foreach ($product->category as $singleCategory)
                                        <span class="label label-info label-many">{{ $singleCategory->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($product->tag as $singleTag)
                                        <span class="label label-info label-many">{{ $singleTag->name }}</span>
                                    @endforeach
                                </td>
                                <td>@if($product->photo1)<a href="{{ asset('uploads/' . $product->photo1) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $product->photo1) }}"/></a>@endif</td>
                                <td>@if($product->photo2)<a href="{{ asset('uploads/' . $product->photo2) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $product->photo2) }}"/></a>@endif</td>
                                <td>@if($product->photo3)<a href="{{ asset('uploads/' . $product->photo3) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $product->photo3) }}"/></a>@endif</td>
                                <td>
                                    @can('product_view')
                                    <a href="{{ route('products.show',[$product->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('product_edit')
                                    <a href="{{ route('products.edit',[$product->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('product_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['products.destroy', $product->id])) !!}
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

            <a href="{{ route('product_categories.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop