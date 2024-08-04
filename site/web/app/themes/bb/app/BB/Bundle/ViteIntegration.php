<?php

namespace App\BB\Bundle;

use App\BB\Attributes\Action;
use App\BB\Attributes\Filter;

class ViteIntegration
{
    #[Action("wp_head", 1)]
    public function client(): void
    {
        echo "<script type=\"module\" src=\"" . bb()->config()->get("hmr.client") . "\"></script>";
    }

    #[Filter("bb/assets/resolver/url", 1, 2)]
    public function url(string $url, string $path): string
    {
        return bb()->config()->get("hmr.sources") . "/{$path}";
    }
}
