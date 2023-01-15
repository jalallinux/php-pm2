<?php

namespace JalalLinuX\Pm2;

final class RootObject
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
}

