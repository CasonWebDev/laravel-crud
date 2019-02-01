<?php

    function currency($num){
        return number_format($num, 2, ',', '.');
    }