<?php

namespace JalalLinuX\Pm2\Structure;

final class Monit
{
    public ?int $memory;
    public ?int $cpu;

    public static function fromJson(array $data): self
    {
        $instance = new self();
        $instance->memory = $data['memory'] ?? null;
        $instance->cpu = $data['cpu'] ?? null;
        return $instance;
    }
}
