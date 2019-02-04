<?php

    function currency($num){
        return number_format($num, 2, ',', '.');
    }

    function convertDecimal($num){
        $converted = str_replace('.','',$num);
        $converted = str_replace(',','.',$converted);
        return $converted;
    }

    function checkQty($products,$id){
        foreach($products as $product){
            if($product['pivot']['products_id'] == $id){
                return $product->pivot->quantity;
            }
        }
        return 0;
    }