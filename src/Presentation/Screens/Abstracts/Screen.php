<?php

namespace App\Presentation\Screens\Abstracts;

use App\Presentation\Screens\Contracts\IScreen;

use App\Shared\Traits\HandleFailure;

abstract class Screen implements IScreen {

    protected bool $dirty = true;

    use HandleFailure;

    public function load() {}

    public function run() : void {

        if ($this->dirty) {
            $this->load();
            $this->dirty = false;
        }
        
    }

    public function invalidate() {
        $this->dirty = true;
    }
}
