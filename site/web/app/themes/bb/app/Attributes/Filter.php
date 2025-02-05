<?php

namespace App\Attributes;

use Attribute;

#[Attribute(
    Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE
)]
class Filter implements WpHook {
    public function __construct(
        public string $hookName,
        public int $priority = 10,
        public int $acceptedArgs = 3
    ) {
    }

    public function register(callable|array $method): void {
        add_filter($this->hookName, $method, $this->priority, $this->acceptedArgs);
    }
}
