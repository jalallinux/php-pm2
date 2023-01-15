<?php

namespace JalalLinuX\Pm2;

use JalalLinuX\Pm2\Structure\Process;

class Pm2
{
    public function list(): array
    {
        return array_map(static function($rec) {
            return Process::fromJson($rec);
        }, json_decode(shell_exec('pm2 jlist'), true));
    }
}
