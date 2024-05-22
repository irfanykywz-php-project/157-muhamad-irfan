<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected function level($total_download = 0, $return_rate = false)
    {
        $level = config('level.rate');

        foreach ($level as $name => $l){
            if ($total_download >= $l['require_downloaded']){
                if ($return_rate){
                    return $l['rate_payment'];
                }else{
                    return $name;
                }
            }
        }
    }

}
