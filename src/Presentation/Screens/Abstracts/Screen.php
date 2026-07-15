<?php

namespace App\Presentation\Screens\Abstracts;

use App\Presentation\Screens\Contracts\IScreen;

abstract class Screen implements IScreen {

    protected function triggerOption(int $option) : void {}
    
}
