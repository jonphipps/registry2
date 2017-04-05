<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Yajra\Datatables\Datatables;

class ProductsController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Product.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('product_access')) {
            return abort(401);
        }
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating new Product.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('product_create')) {
            return abort(401);
        }
        $relations = [
            'categories' => \App\ProductCategory::get()->pluck('name', 'id'),
            'tags' => \App\ProductTag::get()->pluck('name', 'id'),
        ];

        return view('products.create', $relations);
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param  \App\Http\Requests\StoreProductsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductsRequest $request)
    {
        if (! Gate::allows('product_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $product = Product::create($request->all());
        $product->category()->sync(array_filter((array)$request->input('category')));
        $product->tag()->sync(array_filter((array)$request->input('tag')));

        return redirect()->route('products.index');
    }


    /**
     * Show the form for editing Product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('product_edit')) {
            return abort(401);
        }
        $relations = [
            'categories' => \App\ProductCategory::get()->pluck('name', 'id'),
            'tags' => \App\ProductTag::get()->pluck('name', 'id'),
        ];

        $product = Product::findOrFail($id);

        return view('products.edit', compact('product') + $relations);
    }

    /**
     * Update Product in storage.
     *
     * @param  \App\Http\Requests\UpdateProductsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductsRequest $request, $id)
    {
        if (! Gate::allows('product_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $product = Product::findOrFail($id);
        $product->update($request->all());
        $product->category()->sync(array_filter((array)$request->input('category')));
        $product->tag()->sync(array_filter((array)$request->input('tag')));

        return redirect()->route('products.index');
    }


    /**
     * Display Product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('product_view')) {
            return abort(401);
        }
        $relations = [
            'categories' => \App\ProductCategory::get()->pluck('name', 'id'),
            'tags' => \App\ProductTag::get()->pluck('name', 'id'),
        ];

        $product = Product::findOrFail($id);

        return view('products.show', compact('product') + $relations);
    }


    /**
     * Remove Product from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('product_delete')) {
            return abort(401);
        }
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index');
    }

    /**
     * Delete all selected Product at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('product_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Product::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
