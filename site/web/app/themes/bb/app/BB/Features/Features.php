<?php

namespace App\BB\Features;

use App\BB\Attributes\Action;
use App\BB\Core\Hooks;

class Features
{
    #[Action("init")]
    public function init(): void
    {
        Hooks::apply(new Exif());
    }
}
