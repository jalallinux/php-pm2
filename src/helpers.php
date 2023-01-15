<?php

if (!function_exists('pm2list')) {
    function pm2list()
    {
        $data = json_decode(shell_exec('pm2 jlist'), true);
        return array_map(static function($rec) {
            return \JalalLinuX\Pm2\RootObject::fromJson($rec);
        }, $data);
    }
}
