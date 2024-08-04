<?php

namespace App\BB\Bundle;

use App\BB\Attributes\Action;

class EnqueueBundle
{
    use Resolver;

    #[Action("wp_enqueue_scripts")]
    public function front(): void
    {
        wp_enqueue_style("theme", $this->resolve("styles/theme.scss"), [], bb()->config()->get("version"));
        wp_enqueue_script("theme", $this->resolve("scripts/entry.js"), [], bb()->config()->get("version"));
    }
}
