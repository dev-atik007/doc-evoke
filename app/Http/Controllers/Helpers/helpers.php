<?php

namespace App\Http\Controllers\Helpers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notify\Notify;



    // function verificationCode($lenght)
    // {
    //     if ($lenght == 0) return 0;
    //     $min = pow(10, $lenght - 1);
    //     $max = (int) ($min - 1) . '9';
    //     return random_int($min, $max);
    // }

    function verificationCode($lenght)
    {
        if ($lenght == 0) return 0;
        $min = pow(10, $lenght - 1);
        $max = (int) ($min - 1) . '9';
        return random_int($min, $max);
    }

