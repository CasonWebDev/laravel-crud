<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sells;
use App\Models\Customers;
use App\Models\Products;
use App\Models\ProductsSells;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Sells $sells)
    {
        $sells = $sells->all();
        return view('admin.sells.index',compact('sells'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Customers $customers, Products $products)
    {
        $customers = $customers->all();
        $products = $products->where('stock','>', 0)->get();
        return view('admin.sells.add',compact('customers','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Products $products, Sells $sells)
    {
        $sell = $request->except('_token','example1_length');

        $prevsell['customer_id'] = $sell['customer_id'];
        $prevsell['created_at'] = \Carbon\Carbon::now();
        $prevsell['updated_at'] = \Carbon\Carbon::now();
        $prevsell['amount'] = 0;

        $prodsell = [];

        foreach($sell['quantity'] as $key => $value){
            if($value){
                $products = $products->find($key);
                $prevsell['amount'] += $value * $products['price'];
            }
        }

        $idsell = $sells->addSell($prevsell);

        if($idsell['success']){
            $response = $sells->addProdSell($sell['quantity'], $idsell['msg']);
            if($response['success']){
                return redirect()->route('sells.index')->with('success',$response['msg']);
            }else{
                return redirect()->back()->with('error',$response['msg']);
            }
        }else{
            return redirect()->back()->with('error',$response['msg']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sells  $sells
     * @return \Illuminate\Http\Response
     */
    public function show(Sells $sells)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sells  $sells
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Sells $sells, Customers $customers, Products $products)
    {
        $sells = $sells->find($id);
        $customers = $customers->all();
        $products = $products->get();
        return view('admin.sells.update',compact('sells','customers','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sells  $sells
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, Sells $sells, Products $products)
    {
        $sell = $request->except('_token','example1_length');

        $prevsell['customer_id'] = $sell['customer_id'];
        $prevsell['updated_at'] = \Carbon\Carbon::now();
        $prevsell['amount'] = 0;

        $prodsell = [];

        foreach($sell['quantity'] as $key => $value){
            if($value){
                $products = $products->find($key);
                $prevsell['amount'] += $value * $products['price'];
            }
        }

        $idsell = $sells->updateSell($id,$prevsell);

        if($idsell['success']){
            $response = $sells->updateProdSell((array)$sell['products'], $id);
            if($response['success']){
                return redirect()->route('sells.index')->with('success',$response['msg']);
            }else{
                return redirect()->back()->with('error',$response['msg']);
            }
        }else{
            return redirect()->back()->with('error',$response['msg']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sells  $sells
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Sells $sells)
    {
        $response = $sells->deleteSell($id);

        if($response['success']){
            return redirect()->route('sells.index')->with('success',$response['msg']);
        }else{
            return redirect()->back()->with('error',$response['msg']);
        }
    }
}
