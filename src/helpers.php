<?php

use JalalLinuX\Pm2\Pm2;

if (!function_exists('pm2')) {
    function pm2(): Pm2
    {
        return new Pm2();
    }
}
