<?php

namespace JalalLinuX\Pm2;

use JalalLinuX\Pm2\Structure\Process;

class Pm2
{
    /**
     * @param  string  $sortField
     * @param  bool  $desc
     * @return array<Process>
     */
    public function list(string $sortField = 'name', bool $desc = true): array
    {
        return array_map(static fn ($rec) => Process::fromJson($rec), $this->json($sortField, $desc));
    }

    /**
     * @param  string  $publicKey
     * @param  string  $secretKey
     * @param  string|null  $machineName
     * @return bool
     */
    public function link(string $publicKey, string $secretKey, string $machineName = null): bool
    {
        $result = $this->runCommand("link {$secretKey} {$publicKey} {$machineName} --update-env");

        return strpos($result, 'activated!') !== false;
    }

    /**
     * @return bool
     */
    public function unlink(): bool
    {
        $result = $this->runCommand('link delete --update-env');

        return strpos($result, 'ended') !== false;
    }

    /**
     * @param  string|null  $command
     * @param  array  $options
     * @return bool
     */
    public function start(string $command = null, array $options = []): bool
    {
        $options = $this->makeOptions($options);

        return ! is_null($this->runCommand('start'.(! is_null($command) ? " \"{$command}\" {$options} --update-env" : '')));
    }

    /**
     * @param  string  $key
     * @param  string  $value
     * @return Process|null
     */
    public function findBy(string $key, string $value): ?Process
    {
        foreach ($this->list() as $item) {
            if ($item->{$key} == $value) {
                return $item;
            }
        }

        return null;
    }

    /**
     * @return bool
     */
    public function kill(): bool
    {
        return ! is_null($this->runCommand('kill --update-env'));
    }

    /**
     * @param  string  $name
     * @return int|null
     */
    public function pid(string $name): ?int
    {
        foreach ($this->list() as $item) {
            if ($item->name == $name) {
                return intval($item->pid);
            }
        }

        return null;
    }

    /**
     * @return bool
     */
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

    /**
     * @return bool
     */
    public function stopAll(): bool
    {
        if (! is_null($this->runCommand('stop all --update-env'))) {
            $this->save();

            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function restartAll(): bool
    {
        if (! is_null($this->runCommand('restart all --update-env'))) {
            $this->save();

            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function deleteAll(): bool
    {
        if (! is_null($this->runCommand('del all --update-env'))) {
            $this->save();

            return true;
        }

        return false;
    }

    /**
     * @param  string  $idOrName
     * @return bool
     */
    public function stop(string $idOrName): bool
    {
        return ! is_null($this->runCommand("stop {$idOrName} --update-env"));
    }

    /**
     * @param  string  $idOrName
     * @return bool
     */
    public function restart(string $idOrName): bool
    {
        return ! is_null($this->runCommand("restart {$idOrName} --update-env"));
    }

    /**
     * @param  string  $idOrName
     * @return bool
     */
    public function delete(string $idOrName): bool
    {
        return ! is_null($this->runCommand("delete {$idOrName} --update-env"));
    }

    /**
     * @param  bool  $force
     * @return bool
     */
    public function save(bool $force = true): bool
    {
        return ! is_null($this->runCommand('save'.($force ? ' --force' : '')));
    }

    /**
     * @param  string|null  $idOrName
     * @param  int  $lines
     * @return string
     */
    public function logOut(string $idOrName = null, int $lines = 100): string
    {
        return $this->runCommand('logs'.(! is_null($idOrName) ? " {$idOrName}" : '')." --lines={$lines} --nostream --raw --out");
    }

    /**
     * @param  string|null  $idOrName
     * @param  int  $lines
     * @return string
     */
    public function logErr(string $idOrName = null, int $lines = 100): string
    {
        return $this->runCommand('logs'.(! is_null($idOrName) ? " {$idOrName}" : '')." --lines={$lines} --nostream --raw --err");
    }

    /**
     * @return bool
     */
    public function startup(): bool
    {
        $this->runCommand('startup --update-env');

        return $this->save();
    }

    /**
     * @return string
     */
    public function version(): string
    {
        return trim($this->runCommand('--version'));
    }

    /**
     * @param  string  $version
     * @return false|string|null
     */
    public function install(string $version = 'latest')
    {
        return shell_exec("npm install -g pm2@{$version}");
    }

    /**
     * @param  bool  $forceInstall
     * @param  string  $version
     * @return bool
     */
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
        return shell_exec("pm2 {$command}");
    }
}
