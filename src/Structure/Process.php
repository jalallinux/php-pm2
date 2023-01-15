<?php

namespace JalalLinuX\Pm2\Structure;

final class Process
{
    public ?int $pid;

    public ?string $name;

    public ?Pm2Env $pm2Env;

    public ?int $pmId;

    public ?Monit $monit;

    public static function fromJson(array $data): self
    {
        $instance = new self();
        $instance->pid = $data['pid'] ?? null;
        $instance->name = $data['name'] ?? null;
        $instance->pm2Env = ($data['pm2_env'] ?? null) !== null ? Pm2Env::fromJson($data['pm2_env']) : null;
        $instance->pmId = $data['pm_id'] ?? null;
        $instance->monit = ($data['monit'] ?? null) !== null ? Monit::fromJson($data['monit']) : null;

        return $instance;
    }

    public function start(): bool
    {
        return pm2()->start($this->name);
    }

    public function stop(): bool
    {
        return pm2()->stop($this->name);
    }

    public function restart(): bool
    {
        return pm2()->restart($this->name);
    }

    public function delete(): bool
    {
        return pm2()->delete($this->name);
    }

    public function logErr(): string
    {
        return pm2()->logErr($this->name);
    }

    public function logOut(): string
    {
        return pm2()->logOut($this->name);
    }
}
