<?php

namespace App\BB\Attributes;

interface WpHook
{
    public function register(callable|array $method): void;
}
