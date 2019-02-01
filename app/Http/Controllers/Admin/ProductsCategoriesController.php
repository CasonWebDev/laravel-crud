<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductsCategories;

class ProductsCategoriesController extends Controller
{
    public function index()
    {
        $categories = ProductsCategories::all();
        return view('admin.products.categories',compact('categories'));
    }
}
