<?php

namespace App\Providers;

use App\Attributes\Action;
use App\Vite;
use App\WpUtilities\Hooks;
use Roots\Acorn\Sage\SageServiceProvider;
use Illuminate\Foundation\Vite as LaravelVite;

class ThemeServiceProvider extends SageServiceProvider {
    public function register(): void {
        parent::register();

        $this->app->singleton(LaravelVite::class, Vite::class);

        $this->app->usePublicPath(THEME_ABSOLUTE_PATH);
    }

    public function boot(): void {
        parent::boot();

        Hooks::apply($this);
    }

    #[Action("wp_enqueue_scripts")]
    public function front(): void {
        $version = config("app.version");
        $vite    = app(LaravelVite::class);
        $hotFile = THEME_ABSOLUTE_PATH . "/dist/hot";

        $vite->useHotFile($hotFile)
             ->useBuildDirectory("dist");

        echo $hotFile;
        echo $vite->isRunningHot();
        echo $vite("resources/styles/theme.scss");

//        wp_enqueue_style("theme", $vite->asset("resources/styles/theme.scss"), [], $version);
        wp_enqueue_script("theme", $vite->asset("resources/scripts/entry.js"), [], $version);
    }
}
