<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customers;
use App\Models\Products;
use App\Models\ProductsSells;

class Sells extends Model
{
    public function customer(){
        return $this->hasOne(Customers::class,'id','customer_id');
    }
    public function products(){
        return $this->belongsToMany(Products::class, 'products_sells')->withPivot('quantity');
    }

    public function addSell($sell){
        try { 
            $sells = $this->insertGetId($sell); 
            return [
                'success' => true,
                'msg' => $sells
            ];
        } catch(\Illuminate\Database\QueryException $ex){ 
            return [
                'success' => false,
                'msg' => 'Erro ao cadastrar: '.$ex->getMessage()
            ];
        }
    }

    public function updateSell($id,$sell){
        try { 
            $sells = $this->where('id',$id)->update($sell); 
            return [
                'success' => true
            ];
        } catch(\Illuminate\Database\QueryException $ex){ 
            return [
                'success' => false,
                'msg' => 'Erro ao atualizar venda: '.$ex->getMessage()
            ];
        }
    }

    public function addProdSell($prods, $sell){
        try { 
            foreach($prods as $key => $value){
                if($value){
                    $sells = ProductsSells::insert(['sells_id'=>$sell, 'products_id'=>$key, 'quantity'=>$value]); 
                    $produto = Products::where('id',$key)->decrement('stock',$value);
                }
            }
            return [
                'success' => true,
                'msg' => 'Venda cadastrada com sucesso!'
            ];
        } catch(\Illuminate\Database\QueryException $ex){ 
            return [
                'success' => false,
                'msg' => 'Erro ao cadastrar produtos da venda: '.$ex->getMessage()
            ];
        }
        
    }

    public function updateProdSell($prods, $sell){
        try { 
            foreach($prods as $key => $value){
                
                $prodCad = ProductsSells::where('products_id',$key)->where('sells_id',$sell)->first();
                if($value > 0){
                    if($prodCad){
                        ProductsSells::where('products_id',$key)->where('sells_id',$sell)->update(['sells_id'=>$sell, 'products_id'=>$key, 'quantity'=>$value]);
                        
                        if ($prodCad->quantity > intval($value)){
                            Products::where('id',$key)->increment('stock',$prodCad->quantity-$value);
                        }else{
                            Products::where('id',$key)->decrement('stock',$value-$prodCad->quantity);
                        }
                    }else{
                        ProductsSells::insert(['sells_id'=>$sell, 'products_id'=>$key, 'quantity'=>$value]); 
                        Products::where('id',$key)->decrement('stock',$value);
                    }                    
                }elseif($prodCad){                    
                    Products::where('id',$prodCad->products_id)->increment('stock',$prodCad->quantity);
                    ProductsSells::where('products_id',$prodCad->products_id)->where('sells_id',$sell)->delete();
                }
                
            }
            return [
                'success' => true,
                'msg' => 'Venda atualizada com sucesso!'
            ];
        } catch(\Illuminate\Database\QueryException $ex){ 
            return [
                'success' => false,
                'msg' => 'Erro ao atualizar produtos da venda: '.$ex->getMessage()
            ];
        }
        
    }
}
