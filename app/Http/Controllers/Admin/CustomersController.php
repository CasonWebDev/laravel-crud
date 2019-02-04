<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Customers $customers)
    {
        $customers = Customers::all();
        return view('admin.customers.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Customers $customers)
    {
        $customer = $request->except('_token');
        $customer['created_at'] = \Carbon\Carbon::now();
        $customer['updated_at'] = \Carbon\Carbon::now();

        $response = $customers->addCustomer($customer);

        if($response['success']){
            return redirect()->route('customers.index')->with('success',$response['msg']);
        }else{
            return redirect()->back()->with('error',$response['msg']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show(Customers $customers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Customers $customers)
    {
        $customer = $customers->find($id);
        return view('admin.customers.update',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, Customers $customers)
    {
        $customer = $request->except('_token','_method');
        $customer['updated_at'] = \Carbon\Carbon::now();

        $response = $customers->updateCustomer($id,$customer);

        if($response['success']){
            return redirect()->route('customers.index')->with('success',$response['msg']);
        }else{
            return redirect()->back()->with('error',$response['msg']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Customers $customers)
    {
        $response = $customers->deleteCustomer($id);

        if($response['success']){
            return redirect()->route('customers.index')->with('success',$response['msg']);
        }else{
            return redirect()->back()->with('error',$response['msg']);
        }
    }
}
