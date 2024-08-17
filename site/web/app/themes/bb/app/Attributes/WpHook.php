<?php

namespace App\Attributes;

interface WpHook
{
    public function register(callable|array $method): void;
}
