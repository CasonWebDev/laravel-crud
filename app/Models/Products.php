<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductsCategories;
use App\Models\ProductsSells;

class Products extends Model
{
    public function category(){
        return $this->hasOne(ProductsCategories::class,'id','category_id');
    }
    public function sells(){
        return $this->belongsToMany(Products::class, 'products_sells')->withPivot('sells_id','quantity');
    }

    public function addProduct($product){
        try { 
            $products = $this->insert($product); 
            return [
                'success' => true,
                'msg' => 'Produto cadastrado com sucesso!'
            ];
        } catch(\Illuminate\Database\QueryException $ex){ 
            return [
                'success' => false,
                'msg' => 'Erro ao cadastrar: '.$ex->getMessage()
            ];
        }
    }

    public function updateProduct($id,$product){
        try { 
            $products = $this->where('id',$id)->update($product); 
            return [
                'success' => true,
                'msg' => 'Produto atualizado com sucesso!'
            ];
        } catch(\Illuminate\Database\QueryException $ex){ 
            return [
                'success' => false,
                'msg' => 'Erro ao atualizar: '.$ex->getMessage()
            ];
        }
    }

    public function deleteProduct($id){
        try { 
            $products = $this->where('id',$id)->delete(); 
            return [
                'success' => true,
                'msg' => 'Produto deletado com sucesso!'
            ];
        } catch(\Illuminate\Database\QueryException $ex){ 
            return [
                'success' => false,
                'msg' => 'Erro ao deletar: '.$ex->getMessage()
            ];
        }
    }
}
