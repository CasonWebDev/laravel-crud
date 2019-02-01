<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sells;
use App\Models\Customers;

class AdminController extends Controller
{
    public function index()
    {
        $amount = currency(Sells::sum('amount'));
        $sells = Sells::count('id');
        $customers = Customers::count('id');

        return view('admin.home.index',compact('amount','sells','customers'));
    }
}
