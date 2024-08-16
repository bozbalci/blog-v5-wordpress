<?php

namespace App\BB\Bundle;

use App\BB\Attributes\Action;
use App\BB\Attributes\Filter;

trait Resolver
{
    private array $manifest = [];


    #[Action("init")]
    public function load(): void
    {
        $path = bb()->config()->get("manifest.path");

        if (empty($path) || !file_exists($path)) {
            wp_die("Cannot locate manifest.json - <code>npm run build</code> in the theme directory.");
        }

        $this->manifest = json_decode(file_get_contents($path), true);
    }

    #[Filter("script_loader_tag", 1, 3)]
    public function module(string $tag, string $handle, string $url): string
    {
        if (
            strpos($url, BB_HMR_HOST) !== false
            || strpos($url, BB_ASSETS_URI) !== false
        ) {
            $tag = str_replace("<script ", "<script type=\"module\" ", $tag);
        }

        return $tag;
    }

    public function resolve(string $path): string
    {
        $url = "";

        if ($this->has($path)) {
            $url = BB_ASSETS_URI . "/" . $this->find($path)["file"];
        }

        return apply_filters("bb/assets/resolver/url", $url, $path);
    }

    public function dependencies(string $path): array
    {
        $assets = [
            "scripts" => [],
            "styles" => [],
        ];

        if (bb()->config()->get("hmr.active")) {
            return $assets;
        }

        if ($this->has($path)) {
            $assets["scripts"] = collect($this->find($path)["js"] ?? [])
                ->map(fn ($item) => bb()->config()->get("dist.uri") . "/" . $item)
                ->all();
            $assets["styles"] = collect($this->find($path)["css"] ?? [])
                ->map(fn ($item) => bb()->config()->get("dist.uri") . "/" . $item)
                ->all();
        }

        return $assets;
    }

    private function find(string $path): array
    {
        return $this->has($path) ? $this->manifest["resources/$path"] : [];
    }

    private function has(string $path): bool
    {
        return !empty($this->manifest["resources/$path"]);
    }
}
