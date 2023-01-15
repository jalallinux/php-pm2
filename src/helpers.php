<?php

if (!function_exists('pm2list')) {
    function pm2list(): array
    {
        return array_map(static function($rec) {
            return \JalalLinuX\Pm2\Process::fromJson($rec);
        }, json_decode(shell_exec('pm2 jlist'), true));
    }
}
