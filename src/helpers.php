<?php

use JalalLinuX\Pm2\Pm2;

if (!function_exists('pm2')) {
    function pm2(): Pm2
    {
        return new Pm2();
    }
}

if (!function_exists('strBetween')) {
    function strBetween($string, $start, $end)
    {
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }
}
