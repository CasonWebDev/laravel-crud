<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductsCategories extends Model
{
    protected $table = 'products_categories';

    public function addProductsCategories($category){
        try { 
            $categories = $this->insert($category); 
            return [
                'success' => true,
                'msg' => 'Categoria cadastrada com sucesso!'
            ];
        } catch(\Illuminate\Database\QueryException $ex){ 
            return [
                'success' => false,
                'msg' => 'Erro ao cadastrar: '.$ex->getMessage()
            ];
        }
    }

    public function updateProductsCategories($id,$category){
        try { 
            $categories = $this->where('id',$id)->update($category); 
            return [
                'success' => true,
                'msg' => 'Categoria atualizada com sucesso!'
            ];
        } catch(\Illuminate\Database\QueryException $ex){ 
            return [
                'success' => false,
                'msg' => 'Erro ao atualizar: '.$ex->getMessage()
            ];
        }
    }

    public function deleteProductsCategories($id){
        try { 
            $categories = $this->where('id',$id)->delete(); 
            return [
                'success' => true,
                'msg' => 'Categoria deletada com sucesso!'
            ];
        } catch(\Illuminate\Database\QueryException $ex){ 
            return [
                'success' => false,
                'msg' => 'Erro ao deletar: '.$ex->getMessage()
            ];
        }
    }
}
