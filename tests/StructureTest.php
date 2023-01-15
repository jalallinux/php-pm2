<?php

use JalalLinuX\Pm2\Structure\Process;

it('list structure test', function () {
    if (pm2()->isInstall()) {
        expect(pm2()->list())
            ->toBeArray()
            ->each(fn($item) => $item->toBeInstanceOf(Process::class));
    }
});

it('version test', function () {
    if (pm2()->isInstall()) {
        expect(pm2()->version())->toBeString();
    }
});

it('is install test', function () {
    if (pm2()->isInstall()) {
        expect(pm2()->isInstall())->toBeBool();
    }
});

it('is delete all test', function () {
    if (pm2()->isInstall()) {
        expect(pm2()->deleteAll())->toBeBool();
    }
});

it('is stop all test', function () {
    if (pm2()->isInstall()) {
        expect(pm2()->stopAll())->toBeBool();
    }
});

it('is save test', function () {
    if (pm2()->isInstall()) {
        expect(pm2()->save())->toBeBool();
    }
});

it('is flush test', function () {
    if (pm2()->isInstall()) {
        expect(pm2()->flush())->toBeBool();
    }
});

it('is TESTY', function () {
    if (pm2()->isInstall()) {
        $name = 'my-test-process-name';
        pm2()->start("ls -la", $name);
        expect(pm2()->findBy('pid', 0))->toBeInstanceOf(Process::class);
    }
});
