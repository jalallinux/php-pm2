<?php

namespace JalalLinuX\Pm2;

use JalalLinuX\Pm2\Structure\Process;

class Pm2
{
    private ?string $prefix;

    public function __construct(string $prefix = null)
    {
        $this->prefix = $prefix;
    }

    /**
     * @return array<Process>
     */
    public function list(string $sortField = 'name', bool $desc = true): array
    {
        return array_map(static fn ($rec) => Process::fromJson($rec), $this->json($sortField, $desc));
    }

    public function link(string $publicKey, string $secretKey, string $machineName = null): bool
    {
        $result = $this->runCommand("link {$secretKey} {$publicKey} {$machineName} --update-env");

        return strpos($result, 'activated!') !== false;
    }

    public function unlink(): bool
    {
        $result = $this->runCommand('link delete --update-env');

        return strpos($result, 'ended') !== false;
    }

    public function start(string $command = null, array $options = []): bool
    {
        $options = $this->makeOptions($options);

        return ! is_null($this->runCommand('start'.(! is_null($command) ? " \"{$command}\" {$options} --update-env" : '')));
    }

    public function findBy(string $key, string $value): ?Process
    {
        foreach ($this->list() as $item) {
            if ($item->{$key} == $value) {
                return $item;
            }
        }

        return null;
    }

    public function kill(): bool
    {
        return ! is_null($this->runCommand('kill --update-env'));
    }

    public function pid(string $name): ?int
    {
        foreach ($this->list() as $item) {
            if ($item->name == $name) {
                return intval($item->pid);
            }
        }

        return null;
    }

    public function flush(): bool
    {
        return ! is_null($this->runCommand('flush --update-env'));
    }

    /**
     * @return mixed
     */
    public function update()
    {
        return $this->runCommand('update --update-env');
    }

    public function stopAll(): bool
    {
        if (! is_null($this->runCommand('stop all --update-env'))) {
            $this->save();

            return true;
        }

        return false;
    }

    public function restartAll(): bool
    {
        if (! is_null($this->runCommand('restart all --update-env'))) {
            $this->save();

            return true;
        }

        return false;
    }

    public function deleteAll(): bool
    {
        if (! is_null($this->runCommand('del all --update-env'))) {
            $this->save();

            return true;
        }

        return false;
    }

    public function stop(string $idOrName): bool
    {
        return ! is_null($this->runCommand("stop {$idOrName} --update-env"));
    }

    public function restart(string $idOrName): bool
    {
        return ! is_null($this->runCommand("restart {$idOrName} --update-env"));
    }

    public function delete(string $idOrName): bool
    {
        return ! is_null($this->runCommand("delete {$idOrName} --update-env"));
    }

    public function save(bool $force = true): bool
    {
        return ! is_null($this->runCommand('save'.($force ? ' --force' : '')));
    }

    public function logOut(string $idOrName = null, int $lines = 100): string
    {
        return $this->runCommand('logs'.(! is_null($idOrName) ? " {$idOrName}" : '')." --lines={$lines} --nostream --raw --out");
    }

    public function logErr(string $idOrName = null, int $lines = 100): string
    {
        return $this->runCommand('logs'.(! is_null($idOrName) ? " {$idOrName}" : '')." --lines={$lines} --nostream --raw --err");
    }

    public function startup(): bool
    {
        $this->runCommand('startup --update-env');

        return $this->save();
    }

    public function version(): string
    {
        return trim($this->runCommand('--version'));
    }

    /**
     * @return false|string|null
     */
    public function install(string $version = 'latest')
    {
        return shell_exec("npm install -g pm2@{$version}");
    }

    public function isInstall(bool $forceInstall = false, string $version = 'latest'): bool
    {
        $isInstall = ! is_null($this->runCommand('--version'));
        if (! $isInstall && $forceInstall) {
            $this->install($version);

            return $this->isInstall();
        }

        return $isInstall;
    }

    protected function makeOptions(array $options): string
    {
        return implode(' ', array_map(function ($k, $v) {
            return is_int($k) ? "--{$v}" : "--{$k}={$v}";
        }, array_keys($options), $options));
    }

    protected function json(string $sortField, bool $desc = true): array
    {
        return json_decode($this->runCommand("jlist --sort {$sortField}:".($desc ? 'desc' : 'asc')), true) ?? [];
    }

    protected function runCommand(string $command)
    {
        return shell_exec(trim("{$this->prefix} pm2 {$command}"));
    }
}
