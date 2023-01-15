<?php

namespace JalalLinuX\Pm2;

final class AxmDynamic
{

    public static function fromJson(array $data): self
    {
        $instance = new self();
        return $instance;
    }
}
