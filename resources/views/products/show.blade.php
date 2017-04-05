@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.products.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.products.fields.name')</th>
                            <td>{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.products.fields.description')</th>
                            <td>{!! $product->description !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.products.fields.price')</th>
                            <td>{{ $product->price }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.products.fields.category')</th>
                            <td>
                                @foreach ($product->category as $singleCategory)
                                    <span class="label label-info label-many">{{ $singleCategory->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.products.fields.tag')</th>
                            <td>
                                @foreach ($product->tag as $singleTag)
                                    <span class="label label-info label-many">{{ $singleTag->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.products.fields.photo1')</th>
                            <td>@if($product->photo1)<a href="{{ asset('uploads/' . $product->photo1) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $product->photo1) }}"/></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.products.fields.photo2')</th>
                            <td>@if($product->photo2)<a href="{{ asset('uploads/' . $product->photo2) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $product->photo2) }}"/></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.products.fields.photo3')</th>
                            <td>@if($product->photo3)<a href="{{ asset('uploads/' . $product->photo3) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $product->photo3) }}"/></a>@endif</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('products.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop