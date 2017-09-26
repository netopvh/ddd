<?php

if (! function_exists('array_last_value')) {

    function array_last_value($string,$delimiter,$last = true)
    {
        $result = explode($delimiter,$string);

        if($last){
            return array_last($result);
        }else{
            return array_first($result);
        }
    }
}
