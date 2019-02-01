<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::all();

        return view('admin.products.index',compact('products'));
    }
}
