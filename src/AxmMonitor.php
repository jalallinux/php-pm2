<?php

namespace JalalLinuX\Pm2;

final class AxmMonitor
{

    public static function fromJson(array $data): self
    {
        $instance = new self();
        return $instance;
    }
}
