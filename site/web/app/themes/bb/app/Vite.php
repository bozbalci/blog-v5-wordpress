<?php

namespace App;

use Illuminate\Foundation\Vite as LaravelVite;

class Vite extends LaravelVite {
    /**
     * The fucking pieces of shit over at Roots wants me to use Bud,
     * but I will never let them have the satisfaction.
     */
    protected function assetPath($path, $secure = null): string {
        // return app('url')->asset($path, $secure);
        return home_url(THEME_RELATIVE_PATH) . "/" . $path;
    }
}
