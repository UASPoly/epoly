<?php

use RealRashid\SweetAlert\Facades\Alert;

if (!function_exists('successAlert')) {
    function successAlert($title,$message)
    {
        Alert::success($title, $message);
    }
}