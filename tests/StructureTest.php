<?php

use JalalLinuX\Pm2\Structure\Process;

it('structure test', function () {
    $data = pm2()->list();
    expect($data)
        ->toBeArray()
        ->each(fn ($item) => $item->toBeInstanceOf(Process::class));
});
