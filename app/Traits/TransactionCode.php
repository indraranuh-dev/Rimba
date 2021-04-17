<?php

namespace App\Traits;

trait TransactionCode
{
    public static function getCode()
    {
        return 'RMB-' . date('dmYHis');
    }
}