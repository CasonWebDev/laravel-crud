<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    public function addCustomer($customer){
        try { 
            $customers = $this->insert($customer); 
            return [
                'success' => true,
                'msg' => 'Cliente cadastrado com sucesso!'
            ];
        } catch(\Illuminate\Database\QueryException $ex){ 
            return [
                'success' => false,
                'msg' => 'Erro ao cadastrar: '.$ex->getMessage()
            ];
        }
    }

    public function updateCustomer($id,$customer){
        try { 
            $customers = $this->where('id',$id)->update($customer); 
            return [
                'success' => true,
                'msg' => 'Cliente atualizado com sucesso!'
            ];
        } catch(\Illuminate\Database\QueryException $ex){ 
            return [
                'success' => false,
                'msg' => 'Erro ao atualizar: '.$ex->getMessage()
            ];
        }
    }

    public function deleteCustomer($id){
        try { 
            $customers = $this->where('id',$id)->delete(); 
            return [
                'success' => true,
                'msg' => 'Cliente deletado com sucesso!'
            ];
        } catch(\Illuminate\Database\QueryException $ex){ 
            return [
                'success' => false,
                'msg' => 'Erro ao deletar: '.$ex->getMessage()
            ];
        }
    }
}
