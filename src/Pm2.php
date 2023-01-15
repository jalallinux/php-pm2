<?php

namespace JalalLinuX\Pm2;

use JalalLinuX\Pm2\Structure\Process;

class Pm2
{
    public function list(): array
    {
        return array_map(static fn($rec) => Process::fromJson($rec), $this->json());
    }

    public function start(string $command = null, string $name = null): bool
    {
        return !is_null($this->runCommand("start" . (!is_null($command) ? " {$command}" : '') . (!is_null($name) ? " --name {$name}" : '')));
    }

    public function showBy(string $key, string $value): ?Process
    {
        foreach ($this->list() as $item) {
            if ($item->{$key} == $value)
                return $item;
        }
        return null;
    }

    public function kill(): bool
    {
        return !is_null($this->runCommand('kill'));
    }

    public function pid(string $name): ?int
    {
        foreach ($this->list() as $item) {
            if ($item->name == $name)
                return intval($item->pid);
        }
        return null;
    }

    public function flush(): bool
    {
        return !is_null($this->runCommand('flush'));
    }

    public function update()
    {
        return $this->runCommand('update');
    }

    public function stopAll(): bool
    {
        if (!is_null($this->runCommand('stop all'))) {
            $this->save();
            return true;
        }
        return false;
    }

    public function deleteAll(): bool
    {
        if (!is_null($this->runCommand('del all'))) {
            $this->save();
            return true;
        }
        return false;
    }

    public function stop(string $idOrName): bool
    {
        return !is_null($this->runCommand("stop {$idOrName}"));
    }

    public function delete(string $idOrName): bool
    {
        return !is_null($this->runCommand("delete {$idOrName}"));
    }

    public function save(bool $force = true): bool
    {
        return !is_null($this->runCommand('save' . ($force ? ' --force' : '')));
    }

    public function version(): string
    {
        return trim($this->runCommand('--version'));
    }

    public function install(string $version = 'latest')
    {
        return shell_exec("npm install -g pm2@{$version}");
    }

    public function isInstall(bool $forceInstall = false, string $version = 'latest'): bool
    {
        $isInstall = !is_null($this->runCommand('--version'));
        if (!$isInstall && $forceInstall) {
            $this->install($version);
            return $this->isInstall();
        }
        return $isInstall;
    }

    protected function json(): array
    {
        return json_decode($this->runCommand('jlist'), true) ?? [];
    }

    protected function runCommand(string $command)
    {
        return shell_exec("pm2 {$command}");
    }
}
