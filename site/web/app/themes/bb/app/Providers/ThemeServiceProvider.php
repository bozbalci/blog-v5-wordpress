<?php

namespace App\Providers;

use App\Attributes\Action;
use App\Hooks;
use App\Vite;
use Illuminate\Foundation\Vite as LaravelVite;
use Roots\Acorn\Sage\SageServiceProvider;

class ThemeServiceProvider extends SageServiceProvider {
    public function register(): void {
        parent::register();

        $this->app->bind("app.hooks", Hooks::class);

        $this->app->singleton(LaravelVite::class, function () {
            $vite = new Vite();

            $hotFile = THEME_ABSOLUTE_PATH . "/dist/hot";

            $vite->useHotFile($hotFile)->useBuildDirectory("dist");

            $vite->macro("describe", function () {
                var_dump($this);
            });

            return $vite;
        });

        $this->app->usePublicPath(THEME_ABSOLUTE_PATH);
    }

    public function boot(): void {
        parent::boot();

        Hooks::apply($this);
    }

    #[Action("wp_enqueue_scripts")]
    public function front(): void {
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('classic-theme-styles');
        // TODO re-add once we are a block theme:
        // wp_dequeue_style('global-styles');

        $version = config("app.version");
        $vite    = app(LaravelVite::class);

        if ($vite->isRunningHot()) {
            /**
             * This includes the HMR client in the document as well.
             */
            echo $vite(["resources/styles/theme.scss", "resources/scripts/entry.js"]);
        } else {
            wp_enqueue_style(
                "theme",
                $vite->asset("resources/styles/theme.scss"),
                [],
                $version
            );
            wp_enqueue_script(
                "theme",
                $vite->asset("resources/scripts/entry.js"),
                [],
                $version
            );
        }
    }
}
