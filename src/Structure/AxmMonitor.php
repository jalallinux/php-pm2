<?php

namespace JalalLinuX\Pm2\Structure;

final class AxmMonitor
{
    public ?array $data;

    public static function fromJson(array $data): self
    {
        $instance = new self();
        $instance->data = $data;

        return $instance;
    }
}
