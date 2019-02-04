<?php

namespace App\Http\Controllers\Admin;

use App\Models\Products;
use App\Models\ProductsCategories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Products $products)
    {
        $products = $products->all();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ProductsCategories $categories)
    {
        $categories = $categories->all();
        return view('admin.products.add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Products $products)
    {
        $product = $request->except('_token');
        $product['created_at'] = \Carbon\Carbon::now();
        $product['updated_at'] = \Carbon\Carbon::now();
        $product['price'] = convertDecimal($product['price']);

        if($request->hasFile('image')){
            $name = md5(\Carbon\Carbon::now());
            $ext = $request->image->extension();
            $nameFile = "{$name}.{$ext}";
            $product['image'] = $nameFile;

            $upload = $request->image->storeAs('products', $nameFile, 'local');

            if(!$upload){
                return redirect()->back()->with('error','Falha ao fazer upload.');
            }
        }

        $response = $products->addProduct($product);

        if($response['success']){
            return redirect()->route('products.index')->with('success',$response['msg']);
        }else{
            return redirect()->back()->with('error',$response['msg']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Products $products, ProductsCategories $categories)
    {
        $categories = $categories->all();
        $product = $products->find($id);
        return view('admin.products.update',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, Products $products)
    {
        $product = $request->except('_token','_method');
        $product['updated_at'] = \Carbon\Carbon::now();
        $product['price'] = convertDecimal($product['price']);

        if($request->hasFile('image')){
            $name = md5(\Carbon\Carbon::now());
            $ext = $request->image->extension();
            $nameFile = "{$name}.{$ext}";
            $product['image'] = $nameFile;

            $upload = $request->image->storeAs('products', $nameFile, 'local');

            if(!$upload){
                return redirect()->back()->with('error','Falha ao fazer upload.');
            }
        }

        $response = $products->updateProduct($id,$product);

        if($response['success']){
            return redirect()->route('products.index')->with('success',$response['msg']);
        }else{
            return redirect()->back()->with('error',$response['msg']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Products $products)
    {
        $response = $products->deleteProduct($id);

        if($response['success']){
            return redirect()->route('products.index')->with('success',$response['msg']);
        }else{
            return redirect()->back()->with('error',$response['msg']);
        }
    }
}
