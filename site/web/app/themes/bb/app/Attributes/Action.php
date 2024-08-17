<?php

namespace App\Attributes;

use Attribute;

#[Attribute(
    Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE
)]
class Action extends Filter
{
    public function register(callable|array $method): void
    {
        add_action($this->hookName, $method, $this->priority, $this->acceptedArgs);
    }
}
