<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProductsCategories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductsCategories $categories)
    {
        $categories = $categories->all();
        return view('admin.products.categories',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.addcategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ProductsCategories $categories)
    {
        $category = $request->except('_token');
        $category['created_at'] = \Carbon\Carbon::now();
        $category['updated_at'] = \Carbon\Carbon::now();

        $response = $categories->addProductsCategories($category);

        if($response['success']){
            return redirect()->route('categories.index')->with('success',$response['msg']);
        }else{
            return redirect()->back()->with('error',$response['msg']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductsCategories  $productsCategories
     * @return \Illuminate\Http\Response
     */
    public function show(ProductsCategories $productsCategories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductsCategories  $productsCategories
     * @return \Illuminate\Http\Response
     */
    public function edit($id, ProductsCategories $productsCategories)
    {
        $category = $productsCategories->find($id);
        return view('admin.products.updatecategory',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductsCategories  $productsCategories
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, ProductsCategories $productsCategories)
    {
        $category = $request->except('_token','_method');
        $category['updated_at'] = \Carbon\Carbon::now();

        $response = $productsCategories->updateProductsCategories($id,$category);

        if($response['success']){
            return redirect()->route('categories.index')->with('success',$response['msg']);
        }else{
            return redirect()->back()->with('error',$response['msg']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductsCategories  $productsCategories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, ProductsCategories $productsCategories)
    {
        $response = $productsCategories->deleteProductsCategories($id);

        if($response['success']){
            return redirect()->route('categories.index')->with('success',$response['msg']);
        }else{
            return redirect()->back()->with('error',$response['msg']);
        }
    }
}
