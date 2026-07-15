<?php

namespace App\Presentation\Screens\Abstracts;

use App\Presentation\Screens\Contracts\IScreen;

use App\Shared\Traits\HandleFailure;

abstract class Screen implements IScreen {

    use HandleFailure;

    protected function triggerOption(int $option) : void {}
    
}
