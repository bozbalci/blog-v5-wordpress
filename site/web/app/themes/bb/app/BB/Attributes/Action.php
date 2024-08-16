<?php

namespace App\BB\Attributes;

use Attribute;
use App\BB\Attributes\Filter;

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
