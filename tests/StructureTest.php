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

it('is restart all test', function () {
    if (pm2()->isInstall()) {
        expect(pm2()->restartAll())->toBeBool();
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

it('is findBy test', function () {
    if (pm2()->isInstall()) {
        pm2()->start("ls -la", ['name' => ($name = uniqid()), 'no-autorestart']);
        expect(pm2()->findBy('name', $name))->toBeInstanceOf(Process::class);
    }
});

it('is delete test', function () {
    if (pm2()->isInstall()) {
        pm2()->start("ls -la", ['name' => ($name = uniqid()), 'no-autorestart']);
        expect(pm2()->delete($name))->toBeTrue();
    }
});

it('is stop test', function () {
    if (pm2()->isInstall()) {
        pm2()->start("ls -la", ['name' => ($name = uniqid()), 'no-autorestart']);
        expect(pm2()->stop($name))->toBeTrue();
    }
});

it('is restart test', function () {
    if (pm2()->isInstall()) {
        pm2()->start("ls -la", ['name' => ($name = uniqid()), 'no-autorestart']);
        expect(pm2()->restart($name))->toBeTrue();
    }
});

it('is pid test', function () {
    if (pm2()->isInstall()) {
        pm2()->start("ls -la", ['name' => ($name = uniqid()), 'no-autorestart']);
        expect(pm2()->pid($name))->toBeInt();
    }
});

it('is link test', function () {
    if (pm2()->isInstall()) {
        $args = ['PUBLIC_KEY', 'SECRET_KEY', 'MACHINE_NAME'];
        expect(pm2()->link(...$args))->toBeBool();
    }
});

it('is unlink test', function () {
    if (pm2()->isInstall()) {
        expect(pm2()->unlink())->toBeBool();
    }
});

it('is kill test', function () {
    if (pm2()->isInstall()) {
        pm2()->start("ls -la", ['name' => ($name = uniqid()), 'no-autorestart']);
        expect(pm2()->kill())->toBeTrue();
        expect(pm2()->list())->toBeArray()->toBeEmpty();
    }
});
