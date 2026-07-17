<?php

namespace App\Presentation\Screens\Abstracts;

use App\Presentation\Screens\Contracts\IScreen;

use App\Shared\Traits\HandleFailure;

abstract class Screen implements IScreen {

    use HandleFailure;

    protected bool $dirty = true;

    public function run(): void {

        if ($this->dirty) {

            if (!$this->load()) {
                return;
            }

            $this->dirty = false;
        }

        $this->render();
    }

    protected function load(): bool {
        return true;
    }

    public function invalidate() : void {
        $this->dirty = true;
    }

    abstract protected function render(): void;
}
