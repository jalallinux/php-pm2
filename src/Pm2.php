<?php

namespace JalalLinuX\Pm2;

use JalalLinuX\Pm2\Structure\Process;

class Pm2
{
    /**
     * @return array
     */
    public function list(): array
    {
        return array_map(static fn($rec) => Process::fromJson($rec), $this->json());
    }

    /**
     * @param string $publicKey
     * @param string $secretKey
     * @param string|null $machineName
     * @return bool
     */
    public function link(string $publicKey, string $secretKey, string $machineName = null): bool
    {
        $result = $this->runCommand("link {$secretKey} {$publicKey} {$machineName}");
        return strpos($result, 'activated!') !== false;
    }

    /**
     * @return bool
     */
    public function unlink(): bool
    {
        $result = $this->runCommand("link delete");
        return strpos($result, 'ended') !== false;
    }

    /**
     * @param string|null $command
     * @param string|null $name
     * @return bool
     */
    public function start(string $command = null, string $name = null): bool
    {
        return !is_null($this->runCommand("start" . (!is_null($command) ? " {$command}" : '') . (!is_null($name) ? " --name {$name}" : '')));
    }

    /**
     * @param string $key
     * @param string $value
     * @return Process|null
     */
    public function showBy(string $key, string $value): ?Process
    {
        foreach ($this->list() as $item) {
            if ($item->{$key} == $value)
                return $item;
        }
        return null;
    }

    /**
     * @return bool
     */
    public function kill(): bool
    {
        return !is_null($this->runCommand('kill'));
    }

    /**
     * @param string $name
     * @return int|null
     */
    public function pid(string $name): ?int
    {
        foreach ($this->list() as $item) {
            if ($item->name == $name)
                return intval($item->pid);
        }
        return null;
    }

    /**
     * @return bool
     */
    public function flush(): bool
    {
        return !is_null($this->runCommand('flush'));
    }

    /**
     * @return mixed
     */
    public function update()
    {
        return $this->runCommand('update');
    }

    /**
     * @return bool
     */
    public function stopAll(): bool
    {
        if (!is_null($this->runCommand('stop all'))) {
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
        if (!is_null($this->runCommand('del all'))) {
            $this->save();
            return true;
        }
        return false;
    }

    /**
     * @param string $idOrName
     * @return bool
     */
    public function stop(string $idOrName): bool
    {
        return !is_null($this->runCommand("stop {$idOrName}"));
    }

    /**
     * @param string $idOrName
     * @return bool
     */
    public function delete(string $idOrName): bool
    {
        return !is_null($this->runCommand("delete {$idOrName}"));
    }

    /**
     * @param bool $force
     * @return bool
     */
    public function save(bool $force = true): bool
    {
        return !is_null($this->runCommand('save' . ($force ? ' --force' : '')));
    }

    /**
     * @return string
     */
    public function version(): string
    {
        return trim($this->runCommand('--version'));
    }

    /**
     * @param string $version
     * @return false|string|null
     */
    public function install(string $version = 'latest')
    {
        return shell_exec("npm install -g pm2@{$version}");
    }

    /**
     * @param bool $forceInstall
     * @param string $version
     * @return bool
     */
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
